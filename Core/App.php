<?php

namespace Core;

class App
{
    protected static $container;
    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }

    public static function bind($key, $resolver): void
    {
        static::getContainer()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::getContainer()->resolve($key);
    }
}