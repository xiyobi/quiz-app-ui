<?php

use App\Router;

Router::get('/',function (){
    echo 'Request get';
    exit();
});
Router::post('/',function (){
    echo 'Request post';
    exit();
});
Router::delete('/',function (){
    echo 'Request delete';
    exit();
});
Router::put('/',function (){
    echo 'Request put';
    exit();
});