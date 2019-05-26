<?php

namespace Framework\Router;

class Route
{
    private $url, $methods, $action;

    public function __construct(string $url, array $methods, string $action)
    {
        $this->url = $url;
        $this->methods = $methods;
        $this->setAction($action);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getAction(): callable
    {
        return $this->action;
    }

    public function setAction(string $action)
    {
        $base = explode('@', $action);

        $className = $base[0];
        $className = 'App\Controllers\\' . $className;

        $methodName = $base[1];

        $controller = new $className();

        $this->action = [$controller, $methodName];
    }
}