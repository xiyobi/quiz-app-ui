<?php

use App\Http\Controllers\WEB\HomeController;
use App\Http\Controllers\WEB\UserController;

use Src\Router;
use App\Models\User;

Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);
Router::get('/dashboard', [UserController::class, 'home']);
Router::get('/create_quiz', [UserController::class, 'create_quiz']);
Router::get('/quizzes', [UserController::class, 'quizzes']);
Router::get('/statistic', [UserController::class, 'statistic']);


Router::notFound();
