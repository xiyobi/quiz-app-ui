<?php

use Source\Router;
use App\Controllers\API\UserController;

Router::post('/api/users', [UserController::class, 'store']);

