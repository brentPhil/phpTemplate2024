<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    /**
     * @throws Exception
     */
    public static function resolve($key): void
    {
        if(!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if(!$middleware) {
            throw new \Exception("No matching middleware key: {$key} found");
        }

        (new $middleware)->handle();
    }
}