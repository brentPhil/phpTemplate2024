<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;


function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}
//--------------------- Specific Path helper functions --------------------//

//Build Absolute Path to Root Directory

function base_path($path): string
{
    $root_path = str_replace('\\', '/', BASE_PATH);
    return $root_path . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);
    require base_path('src/views/' . $path);
}

function assets($src, $default = []): string
{
    $root_path = '/' . basename(__DIR__);
    return $src ? "$root_path/public/$src" : "$root_path/public/$default";
}

function root($src): string
{
    $root_path = '/' . basename(__DIR__);
    return "$root_path/$src";
}

function getFormattedDate($dateString, $format = 'F j, Y, g:i a'): string
{
    try {
        $date = new DateTime($dateString);
        return $date->format($format);
    } catch (Exception $e) {
        // Handle the error, return a default value, or rethrow the exception
        return 'Invalid date';
    }
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

#[NoReturn] function redirect($path): void
{
    header('Location:' . root($path));
    exit();
}

function old($key, $default = null)
{
    // Return the old value from the session or the default value if not found
    return \Core\Session::get('old')[$key] ?? $default;
}
