<?php
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file))
        require_once $file;
});

session_start();

const TEST_ENV_URI = "/softUni_PHP_Web_Basics/27.%20Workshop-Creating%20a%20DIY%20Custom%20MVC%20PHP%20Framework/";

$router = new \Routing\Router();
require_once 'routes.php';

$self = $_SERVER['PHP_SELF'];
$junk = str_replace('index.php', '', $self);

$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uri = str_replace(TEST_ENV_URI, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);

$controllerName = array_shift($uriInfo);

$methodName = array_shift($uriInfo);

$mvcContext = new \Core\MvcContext($controllerName, $methodName, $uriInfo);
$app = new \Core\Application($mvcContext, $uri, $_SERVER, $router);

$app->registerDependency(\ViewEngine\ViewInterface::class,
                        \ViewEngine\View::class);

$app->registerDependency(\Repository\Users\UserRepositoryInterface::class,
    Repository\Users\UserRepository::class);

$app->registerDependency(\Services\Encryption\EncryptionServiceInterface::class,
                        \Services\Encryption\ArgonEncryptionService::class);
$app->registerDependency(\Services\Users\UserServiceInterface::class,
                        \Services\Users\UserService::class);

$app->addBean(\Database\DatabaseInterface::class,
                                    new \Database\PDODatabase( new PDO("mysql:host=localhost:3306;dbname=php_web_test", "root", "toor")) );

$app->start();