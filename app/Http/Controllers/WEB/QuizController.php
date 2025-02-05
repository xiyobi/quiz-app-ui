<?php

namespace App\Http\Controllers\WEB;

use App\Models\Quiz;

class QuizController {
    public function takeQuiz (string $uniqueValue): void {
        view('quiz/take-quiz',[
            'uniqueValue' => $uniqueValue
        ]);
    }
}