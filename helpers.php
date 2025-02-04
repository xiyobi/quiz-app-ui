<?php
//$arr = ['user'=>'Axror', 'password'=>'1234'];
//
//var_dump($arr);
//
//extract($arr);
//
//echo $user;
//echo $password;

use JetBrains\PhpStorm\NoReturn;

function view (string $page, array $data = []): void {
    extract($data);
    require 'resources/views/' . $page . '.php';
    exit();
}

function assets ($fileName): string {
    return $_ENV['APP_URL'] . '/public' . $fileName;
}
function components (string $component, array $data = []): void {
    extract($data);
    require 'resources/views/components/' . $component . '.php';
}
#[NoReturn] function redirect (string $url): void {
    header('Location: ' . $url);
    exit();
}

#[NoReturn] function apiResponse ($data, $status=200): void {
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}