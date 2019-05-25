<?php

namespace Framework\Router;

use Framework\Router\Exceptions\NotFoundException;

class Router
{
    private const DEFAULTS = [
        'controller' => 'HomeController',
        'action' => 'index'
    ];

    /**
     * @throws NotFoundException
     */
    public function __construct(string $uri)
    {
        $base = explode('/', $uri);
        $base = array_filter($base);

        $controller = $base[1] ?? self::DEFAULTS['controller'];
        $controller = 'App\Controllers\\' . $controller;

        $action = $base[2] ?? self::DEFAULTS['action'];

        if(!class_exists($controller)) {
            throw new NotFoundException('Undefined controller was invoked');
        }

        $controller = new $controller();

        if(!method_exists($controller, $action)) {
            throw new NotFoundException('Undefined action was invoked');
        }

        $controller->$action();
    }
}