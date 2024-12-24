<?php
namespace App;
class Router
{
    public $currentRounte;
    public function __construct(){
        $this->currentRounte=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    }
    public  static function getRounte(): string|false|null|int|array{
        return (new static())->currentRounte;

    }

    public static  function  getResourse($route): false|string
    {
        $resourceIndex = mb_stripos($route, '{id}');
        if (!$resourceIndex) {
            return false;
        }
        $resourceValue =substr(self::getRounte(),$resourceIndex);
        if ($limit = mb_stripos($resourceValue, '/')) {
            return substr($resourceValue, 0, $limit);
        }
        return $resourceValue ? $resourceValue : false;

    }
    public static function runCallback(string $route, callable $callback): void
    {
        $resourceValue = self::getResourse($route);
        if ($resourceValue) {
            $resourceRoute = str_replace('{id}', $resourceValue, $route);
            if ($resourceRoute == self::getRounte()) {
                $callback($resourceValue);
                exit();
            }
        }
        if ($route == self::getRounte()) {
            $callback();
            exit();
        }
    }

    public static function get($route,$callback): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        self::runCallback($route, $callback);
    }
}

    public static function post($route,$callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::runCallback($route, $callback);
        }

    }
    public static function put($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'PUT') {
            if (isset($_POST['_method']) && $_POST['_method'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PUT') {
                self::runCallback($route, $callback);
            }
        }

    }

    public static function delete($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['_method']) && $_POST['_method'] == 'DELETE') {
                self::runCallback($route, $callback);
            }
        }

    }

    public static function isApiCall(): bool
    {
        return mb_stripos(self::getRounte(), '/api') === 0;
    }

    public static function isTelegram(): bool
    {
        return mb_stripos(self::getRounte(), '/telegram') === 0;
    }

}