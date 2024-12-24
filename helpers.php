<?php

use JetBrains\PhpStorm\NoReturn;

function view($page, $data = []): void
{
    extract($data);
    require 'views/'.$page. '.php';
}
#[NoReturn] function
redirect(string $url): void
{
    header("Location: $url");
    exit();
}

#[NoReturn] function apiResponse($data): void
{
    header("Content-Type: application/json");
    echo json_encode($data);
    exit();
}
