<?php
const BASE_PATH = __DIR__ . './../';
function base_path($path): string
{
    return BASE_PATH . $path;
}

require base_path('functions.php');

spl_autoload_register(function ($class)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('router/router.php');
