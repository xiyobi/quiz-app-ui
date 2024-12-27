<?php

namespace App\Http\Controllers\API;

use Src\Auth;

class QuizController
{
    public function store(): void
    {
        if (Auth::check()) {
            $headers = getallheaders();
            $bearer = $headers['Authorization'];
            $token = str_replace('Bearer ', '', $bearer);
            apiResponse([
                'message' => 'Quiz created successfully'], 201);
        }

    }
}
