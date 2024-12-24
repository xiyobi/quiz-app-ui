<?php

use App\Router;

use Controllers\UserController;
use Controllers\TodoController;

Router::get('/todos',[TodoController::class,'show']);
Router::get('/users',[UserController::class,'index']);

//
//Router::get('/',fn()=>(new UserController())->index());
//Router::post('/',[UserController::class,'index']);
//Router::delete('/',[UserController::class,'index']);
//Router::put('/',[UserController::class,'index']);
//
