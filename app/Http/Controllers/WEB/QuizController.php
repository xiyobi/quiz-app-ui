<?php

namespace App\Http\Controllers\WEB;


use App\Models\Quiz;


class QuizController
{
    public function take_quiz(string $uniqueValue)
    {
        $quiz = (new Quiz())->findByUniqueValue($uniqueValue);
        if ($quiz) {
            view("quiz/take_quiz");
        }
        view('errors/404');
    }

}