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
    public function take_quiz():void
    {
        view('/quiz/take_quiz');
    }
    public function update(int $id):void
    {
        view('dashboard/update-quiz',
        ['id'=>$id]
        );
    }

}