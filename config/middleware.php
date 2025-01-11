<?php

use Src\middleware\AuthMiddleware;



return[
    'auth:api'=>AuthMiddleware::class,
];
