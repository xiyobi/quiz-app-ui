<?php

use Src\Router;
use App\Models\User;

Router::get('/', function () {
    view("home");

});
Router::get('/about', function () {
    view("about");

});

$user=new User();

//   dd($user->create("Hasanov",'hasanboyeva1@gmail.com1','123456789'));
//dd($user->getUser("Ulug'bek@gmail.com",'123456789'));