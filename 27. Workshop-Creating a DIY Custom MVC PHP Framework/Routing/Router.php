<?php


namespace Routing;


class Router implements RouterInterface
{
    private $routes = [];

    public function __construct()
    {
        $this->routes['GET'] = [];
        $this->routes['POST'] = [];
    }

    // profile/(.*?)/edit
    public function registerRoute(string $route, string $requestMethod, callable $handler): RouterInterface
    {
        $this->routes[$requestMethod][$route] = $handler;

        return $this;
    }

    public function invoke(string $uri, string $requestMethod): bool
    {

        foreach ($this->routes[$requestMethod] as $route => $handler) {
            $res = preg_match_all('/^' . $route . '$/', $uri,$matches);
            if (!$res){
                continue;
            }

            $handler($matches);
            return true;
        }
        return false;
    }
}