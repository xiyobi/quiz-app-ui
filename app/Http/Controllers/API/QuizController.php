<?php

namespace App\Http\Controllers\API;


use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Src\Auth;

class QuizController
{
    public function store(): void
    {
        $quiz_id = Quiz::create();
        $question_id = Question::create($quiz_id);
        Option::create($question_id);
        apiResponse(['message' => 'Quiz created successfully'], 201);
//        if (Auth::check()) {
//            $headers = getallheaders();
//            $bearer = $headers['Authorization'];
//            $token = str_replace('Bearer ', '', $bearer);
//            apiResponse([
//                'message' => 'Quiz created successfully'], 201);
//        }

    }
}
