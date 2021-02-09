<?php

/** @var Routing\Router $router*/

$router->registerRoute(
    'profile\/(.*?)\/edit',
    'GET',
    function ($matches){
        (new \Controller\ProfileController())->editProfile($matches[1][0]);
});

$router->registerRoute(
    'profile\/(.*?)\/edit',
    'POST',
    function ($matches){
        (new \Controller\ProfileController())->editProfileProcess($matches[1][0]);
});