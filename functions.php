<?php

function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
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
//dd($_SERVER);
