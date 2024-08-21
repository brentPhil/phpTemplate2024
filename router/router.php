<?php
use JetBrains\PhpStorm\NoReturn;

$routesMenu = require 'routes.php';
$heading = '';
$routes = [];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

foreach ($routesMenu as $item) {
    $routes[$item['url']] = $item['path'];
    $item['url'] === $uri && $heading = $item['label'];
}

#[NoReturn] function abort($code = 404): void
{
    http_response_code($code);

    require view("{$code}.php");

    die();
}

require view('layout.php');
