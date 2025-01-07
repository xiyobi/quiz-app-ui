<?php

use App\Http\Controllers\WEB\HomeController;
use Src\Router;
use App\Models\User;

Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);
