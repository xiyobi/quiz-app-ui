<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\QuizController;
use Src\Router;

Router::post('/api/register', [UserController::class, 'store']);
Router::post('/api/login', [UserController::class, 'log_in']);

Router::post('/api/quizzes', [QuizController::class, 'store']);

