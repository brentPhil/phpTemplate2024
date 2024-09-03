<?php

use Core\ValidationException;

$router = new Core\Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

require base_path('UI/functionComponent.php');

try {
        $_SESSION['user'] ?? false
        ? require base_path('src/views/layout.php')
        : $router->route($uri, $method);
} catch (ValidationException $exception) {
    \Core\Session::setMessage('errors', $exception->getErrors());
    \Core\Session::setMessage('old', $exception->getOld());

    redirect($router->previousUrl());
}

\Core\Session::clearMessages();