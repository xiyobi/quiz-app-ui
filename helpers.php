<?php

use JetBrains\PhpStorm\NoReturn;

function view($page, $data = []): void
{
    extract($data);
    require 'resources/views/'.$page. '.php';
    exit();
}
#[NoReturn] function redirect(string $url): void
{
    header("Location: $url");
    exit();
}
#[NoReturn] function apiResponse($data, $status=200): void
{
    header("Content-Type: application/json");
    http_response_code($status);
    echo json_encode($data);
    exit();
}
