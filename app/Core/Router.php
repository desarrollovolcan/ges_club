<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$this->normalize($path)] = $handler;
    }

    public function dispatch(string $uri, string $method = 'GET'): void
    {
        $path = $this->normalize(parse_url($uri, PHP_URL_PATH) ?? '/');
        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null) {
            http_response_code(404);
            echo 'Página no encontrada.';
            return;
        }

        call_user_func($handler);
    }

    private function normalize(string $path): string
    {
        $path = trim($path);

        if ($path === '' || $path === '/') {
            return '/';
        }

        if (strpos($path, '/index.php') === 0) {
            $path = substr($path, strlen('/index.php'));
        }

        $trimmed = trim($path, '/');

        return $trimmed === '' ? '/' : '/' . $trimmed;
    }
}
