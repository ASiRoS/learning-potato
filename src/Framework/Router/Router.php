<?php

namespace Framework\Router;

use Framework\Router\Exceptions\NotFoundException;

class Router
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param RouteCollection $routes
     * @throws NotFoundException
     */
    public function match(RouteCollection $routes): void
    {
        foreach($routes->getRoutes() as $route) {
            if(
                in_array($_SERVER['REQUEST_METHOD'], $route->getMethods()) &&
                $route->getUrl() === $_SERVER['REQUEST_URI']
            ) {
                call_user_func($route->getAction());
            } else {
                throw new NotFoundException();
            }
        }
    }
}