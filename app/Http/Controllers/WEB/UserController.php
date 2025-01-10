<?php

namespace App\Http\Controllers\WEB;

class UserController
{
    public function home()
    {
        view('dashboard/home');
    }
}