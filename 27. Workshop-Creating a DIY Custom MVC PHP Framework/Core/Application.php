<?php


namespace Core;


use Routing\Router;
use Routing\RouterInterface;

class Application
{

    /** @var RouterInterface */
    private $router;

    /** @var MvcContextInterface */
    private $mvcContext;

    private $serverInfo;
    private $uri;

    private $dependencies = [];
    private $resolvedDependencies = [];

    public function __construct(MvcContextInterface $mvcContext, $uri, $serverInfo, RouterInterface $router)
    {
        $this->mvcContext = $mvcContext;
        $this->router = $router;
        $this->serverInfo = $serverInfo;
        $this->uri = $uri;
        $this->dependencies[MvcContextInterface::class] = get_class($mvcContext);
        $this->resolvedDependencies[get_class($mvcContext)] = $mvcContext;
    }

    public function registerDependency(string $abstraction, string $implementation)
    {
        $this->dependencies[$abstraction] = $implementation;
    }

    public function addbean(string $className, $object)
    {
        $this->registerDependency($className, get_class($object));
        $this->resolvedDependencies[$className] = $object;
    }

    public function start()
    {
        $fullControllerName = 'Controller\\' . ucfirst($this->mvcContext->getControllerName()) . 'Controller';

        if (!class_exists($fullControllerName) || !method_exists($fullControllerName, $this->mvcContext->getActionName())) {
            if (!$this->router->invoke($this->uri, $_SERVER['REQUEST_METHOD'])) {
                http_response_code(404);
                echo "<h1>404 Not Found</h1>";
            }
            exit;
        }

        $controllerInstance = $this->resolve($fullControllerName);

        $getParams = $this->mvcContext->getParams();
        $paramCount = count($getParams);
        $methodParams = array_merge([], $getParams);

        $methodInfo = new \ReflectionMethod($controllerInstance, $this->mvcContext->getActionName());

        $paramsInfo = $methodInfo->getParameters();

        for ($i = $paramCount; $i < count($paramsInfo); $i++){
            $param = $paramsInfo[$i];
            $paramInterface = $param->getClass();
            $paramInterfaceName = $paramInterface->getName();

            if (key_exists($paramInterfaceName, $this->dependencies)) {
                $paramClassName = $this->dependencies[$paramInterfaceName];
                $paramInstance = $this->resolve($paramClassName);
                $methodParams[] = $paramInstance;
            } else {
                $obj = new $paramInterfaceName();
                $this->bindData($_POST, $obj);
                $methodParams[] = $obj;
            }
        }
        call_user_func_array([$controllerInstance, $this->mvcContext->getActionName()], $methodParams);
    }

    public function resolve($className)
    {
        if (key_exists($className, $this->resolvedDependencies)) {
            return $this->resolvedDependencies[$className];
        }

        $classInfo = new \ReflectionClass($className);
        $ctor = $classInfo->getConstructor();

        if (null === $ctor) {
            $obj = new $className;
            $this->resolvedDependencies[$className] = $obj;

            return $obj;
        }

        $params = $ctor->getParameters();
        $getParams = $this->mvcContext->getParams();
        $resolvedParams = [];
        for($i = 0; $i < count($params); $i++){
           $parameter = $params[$i];
           $dependencyInterface = $parameter->getClass();
           if (key_exists($dependencyInterface->getName(), $this->resolvedDependencies)){
               $resolvedParams[] = $this->resolvedDependencies[$dependencyInterface->getName()];
           }else {
               $dependencyClass = $this->dependencies[$dependencyInterface->getName()];
               $dependencyInstance = $this->resolve($dependencyClass);
               $resolvedParams[] = $dependencyInstance;
           }
        }

        $obj = $classInfo->newInstanceArgs($resolvedParams);

       $this->resolvedDependencies[$className] = $obj;

       return $obj;
    }

    private function bindData(array $data, $object)
    {
        $classInfo = new \ReflectionClass($object);
        $fields = $classInfo->getProperties();

        foreach ($fields as $field) {
            $field->setAccessible(true);
            if (key_exists($field->getName(), $data)) {
                $field->setValue($object, $data[$field->getName()]);
            }
        }
    }
}