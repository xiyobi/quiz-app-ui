<?php

namespace App\Http\Controllers\WEB;


use App\Models\Quiz;


class QuizController
{
    public function take_quiz(string $uniqueValue)
    {
        view('quiz/take_quiz',[
            'uniqueValue'=>$uniqueValue
        ]);
    }

}