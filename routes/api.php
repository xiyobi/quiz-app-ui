<?php

use App\Router;
use controllers\UserController;

Router::get('/',[UserController::class,'index']);
Router::post('/',[UserController::class,'index']);
Router::put('/',[UserController::class,'index']);
Router::delete('/',[UserController::class,'index']);

Router::get('/{id}',[UserController::class,'index']);
Router::post('/{id}',[UserController::class,'index']);
Router::put('/{id}',[UserController::class,'index']);
Router::delete('/{id}',[UserController::class,'index']);