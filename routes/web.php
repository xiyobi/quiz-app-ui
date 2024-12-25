<?php

    //use App\Router;
    //
    //use Controllers\UserController;
    //use Controllers\TodoController;
   use App\Models\User;
   $user=new User();
   dd($user->create("Hasanboyeva",'hasanova@gmail.com','123456789'));
//dd($user->getUser("Ulug'bek@gmail.com",'123456789'));

    //Router::get('/todos',[TodoController::class,'show']);
    //Router::get('/users',[UserController::class,'index']);
    //
    ////
    //Router::get('/',fn()=>(new UserController())->index());
    ////Router::post('/',[UserController::class,'index']);
    ////Router::delete('/',[UserController::class,'index']);
    ////Router::put('/',[UserController::class,'index']);
    ////
