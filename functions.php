<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function view($path): string
{
    return base_path('src/views/' . $path);
}

function assets($src, $default): string
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

function authurize($condition, $status = Response::FORBIDDEN): void
{
    !$condition && abort(Response::FORBIDDEN);
}
