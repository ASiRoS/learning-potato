<?php

use Framework\Router\Exceptions\NotFoundException;
use Framework\Router\Router;

require_once '../vendor/autoload.php';

try {
    $router = new Router($_SERVER['REQUEST_URI']);
} catch(NotFoundException $exception) {
    echo 'Какой-нибудь красивый файлик';
}
