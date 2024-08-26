<?php

spl_autoload_register(function ($class)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$container = new \Core\Container();

$container->bind('Core\Database', function (){
    $config = require base_path('config.php');
    return new \Core\Database($config['database']);
});

\Core\App::setContainer($container);