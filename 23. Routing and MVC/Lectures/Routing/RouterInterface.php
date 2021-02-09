<?php


namespace Routing;


interface RouterInterface
{
    public function registerRoute(string $route,
                                  string $requestMethod,
                                  callable $handler): RouterInterface;

    public function invoke(string $uri, string $requestMethod): bool;
}