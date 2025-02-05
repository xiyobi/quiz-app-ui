<?php

namespace Src;


use Src\middlewares\AuthMiddleware;

class Router {
    public $currentRoute;

    public function __construct () {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function getRoute (): false|array|int|string|null {
        return (new static())->currentRoute;
    }

    public static function getResource ($route): false|string {
        $resourceIndex = mb_stripos($route, '{id}');
        if (!$resourceIndex) {
            return false;
        }
        $resourceValue = substr(self::getRoute(), $resourceIndex);
        if ($limit = mb_stripos($resourceValue, '/')) {
            return substr($resourceValue, 0, $limit);
        }
        return $resourceValue ?: false;
    }
    public static function runCallback (string $route, callable|array $callback, ?string $middleware=null): void {
        if (gettype($callback) == 'array'){
            $resourceValue = self::getResource($route);
            if ($resourceValue) {
                $resourceRoute = str_replace('{id}', $resourceValue, $route);
                if ($resourceRoute == self::getRoute()) {
                    self::middleware($middleware);
                    (new $callback[0])->{$callback[1]}($resourceValue);
                    exit();
                }
            }
            if ($route == self::getRoute()) {
                self::middleware($middleware);
                (new $callback[0])->{$callback[1]}();
                exit();
            }
        }
        $resourceValue = self::getResource($route);
        if ($resourceValue) {
            $resourceRoute = str_replace('{id}', $resourceValue, $route);
            if ($resourceRoute == self::getRoute()) {
                self::middleware($middleware);
                $callback($resourceValue);
                exit();
            }
        }
        if ($route == self::getRoute()) {
            self::middleware($middleware);
            $callback();
            exit();
        }
    }
    public static function get (string $route, callable|array $callback, ?string $middleware=null): void {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            self::runCallback($route, $callback, $middleware);
        }
    }

    public static function post (string $route, callable|array $callback, ?string $middleware=null): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::runCallback($route, $callback, $middleware);
        }
    }

    public static function put (string $route, callable|array $callback, ?string $middleware=null): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'PUT') {
            if ((isset($_POST['_method']) && $_POST['_method'] == 'PUT') || $_SERVER['REQUEST_METHOD'] == 'PUT') {
                self::runCallback($route, $callback, $middleware);
            }
        }
    }
    public static function patch (string $route, callable|array $callback, ?string $middleware=null): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {
            if ((isset($_POST['_method']) && $_POST['_method'] == 'PATCH') || $_SERVER['REQUEST_METHOD'] == 'PATCH') {
                self::runCallback($route, $callback, $middleware);
            }
        }
    }
    public static function delete (string $route, callable|array $callback, ?string $middleware=null): void {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            self::runCallback($route, $callback, $middleware);
        }
    }
    public static function isApiCall (): bool {
        return mb_stripos(self::getRoute(), '/api') === 0;
    }
    public static function middleware (?string $middleware=null): void {
        if ($middleware){
            $middlewareConfig = require '../config/middleware.php';
            if (is_array($middlewareConfig)){
                if (array_key_exists($middleware, $middlewareConfig)){
                    $middlewareClass = $middlewareConfig[$middleware];
                    (new $middlewareClass)->handle();
                }
            }
        }
    }
    public static function isTelegram (): bool {
        return mb_stripos(self::getRoute(), '/telegram') === 0;
    }
    public static function notFound (): void {
        if (self::isApiCall()) {
            apiResponse(['error' => 'Not found'], 404);
        }
        view('errors/404');
    }
}