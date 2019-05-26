<?php

use Framework\Router\Exceptions\NotFoundException;
use Framework\Router\RouteCollection;
use Framework\Router\Router;

require_once '../vendor/autoload.php';

try {
    $router = new Router($_SERVER['REQUEST_URI']);
    $routes = new RouteCollection();

    $routes->get('/','LoginController@index');

    $router->match($routes);
} catch(NotFoundException $exception) {
    echo 'Страница не найдена';
}
