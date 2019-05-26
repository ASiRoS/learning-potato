<?php

namespace Framework\Router;

class RouteCollection
{
    private $routes = [];

    public function add(string $url, array $methods, string $action)
    {
        $this->routes[] = new Route($url, $methods, $action);
    }

    public function get(string $url, string $action)
    {
        $this->add($url, ['GET'], $action);
    }

    public function post(string $url, string $action)
    {
        $this->add($url, ['POST'], $action);
    }

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}