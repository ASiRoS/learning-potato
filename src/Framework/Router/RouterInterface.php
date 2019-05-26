<?php

namespace Framework\Router;

interface RouterInterface
{
    public function add(string $url, array $methods, string $action);

    public function get(string $url, string $action);

    public function post(string $url, string $action);
}