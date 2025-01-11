<?php

namespace App\Http\Controllers\WEB;

class UserController
{
    public function home():void
    {
        view('dashboard/home');
    }
    public function create_quiz():void
    {
        view('dashboard/create-quiz');
    }
    public function my_quizzes():void
    {
        view('dashboard/my_quizzes');
    }
    public function statistic():void
    {
        view('dashboard/statistic');
    }

}