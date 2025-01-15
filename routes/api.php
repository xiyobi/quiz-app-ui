<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\QuizController;
use Src\Router;

Router::get('/api/users/getInfo',[UserController::class, 'show'],'auth:api');
Router::post('/api/register', [UserController::class, 'store']);
Router::post('/api/login', [UserController::class, 'log_in']);
Router::delete('/api/delete', [UserController::class, 'delete']);

//Quiz
Router::post('/api/quizzes', [QuizController::class, 'store'],'auth:api');

Router::notFound();

