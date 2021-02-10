<?php
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file))
        require_once $file;
});

const TEST_ENV_URI = "/SoftUni_PHP_Web_Basics/23.%20Routing%20and%20MVC/Lectures/";

$router = new \Routing\Router();

require_once 'routes.php';

$self = $_SERVER['PHP_SELF'];
$junk = str_replace('index.php', '', $self);

$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uri = str_replace(TEST_ENV_URI, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);

$controllerName = array_shift($uriInfo);
$fullControllerName = 'Controller\\' . ucfirst($controllerName) . 'Controller';
$methodName = array_shift($uriInfo);

if (!class_exists($fullControllerName) || !method_exists($fullControllerName, $methodName)) {
    if (!$router->invoke($uri, $_SERVER['REQUEST_METHOD'])) {
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
    }
    exit;
}

$controllerInstance = new $fullControllerName();

call_user_func_array([$controllerInstance, $methodName], $uriInfo);