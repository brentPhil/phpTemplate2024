<?php

namespace Core;
use Core\Middleware\Middleware;
use Exception;
use JetBrains\PhpStorm\NoReturn;

class Router {
    protected array $routes = [];

    public function add( $uri, $controller, $method ): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => []
        ];

        return $this;
    }

    public function get( $uri, $controller ): Router
    {
        return $this->add( $uri, $controller, 'GET' );
    }

    public function post( $uri, $controller ): Router
    {
        return $this->add( $uri, $controller, 'POST' );
    }

    public function delete( $uri, $controller ): Router
    {
        return $this->add( $uri, $controller, 'DELETE' );
    }

    public function patch( $uri, $controller ): Router
    {
        return $this->add( $uri, $controller, 'PATCH' );
    }

    public function put( $uri, $controller ): Router
    {
        return $this->add( $uri, $controller, 'PUT' );
    }

    public function only($key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function previousUrl(): string
    {
        $relativeUrl = basename(dirname($_SERVER['HTTP_REFERER'])) . '/' . basename($_SERVER['HTTP_REFERER']);
        return str_replace('phpTemplate2024/', '', $relativeUrl);
    }

    #[NoReturn] protected function abort($code = 404): void
    {
        http_response_code($code);

        view("{$code}.php");

        die();
    }

}