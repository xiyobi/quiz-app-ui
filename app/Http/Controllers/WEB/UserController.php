<?php

namespace App\Http\Controllers\WEB;

class UserController {
    public function home () {
        view('dashboard/home');
    }
    public function quizzes () {
        view('dashboard/quizzes');
    }
    public function createQuiz () {
        view('dashboard/create-quiz');
    }
    public function statistics () {
        view('dashboard/statistics');
    }

    public function update (int $id) {
        view('dashboard/update-quiz', [
            'id' => $id
        ]);
    }
}