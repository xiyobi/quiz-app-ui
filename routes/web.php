<?php

use App\Http\Controllers\WEB\HomeController;
use Src\Router;
use App\Models\User;

Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);


//$user=new User();
//
////   dd($user->create("Hasanov",'hasanboyeva1@gmail.com1','123456789'));
////dd($user->getUser("Ulug'bek@gmail.com",'123456789'));