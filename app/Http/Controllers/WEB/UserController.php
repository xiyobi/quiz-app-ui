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
    public function quizzes():void
    {
        view('dashboard/quizzes');
    }
    public function statistic():void
    {
        view('dashboard/statistic');
    }

}