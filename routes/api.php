<?php

use App\Http\Controllers\API\UserController;
use App\Http\Router;

Router::post('/api/users', [UserController::class, 'store']);

