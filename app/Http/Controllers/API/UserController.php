<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
use Src\Auth;

class UserController
{
    use Validator;

    public function store()
    {
        $userData = $this-> validate([

            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string',

        ]);

        $user = new User();
        $user->create($userData['full_name'],$userData['email'],$userData['password']);
        apiResponse(
            ['massage' => 'User created successfully',
            'token'=>$user->api_token],
            200);
    }

    public function  log_in(): void
    {
        $userData = $this-> validate([
            'email' => 'string',
            'password' => 'string',
        ]);
        $user= new User();
        if($user->getUser($userData['email'],$userData['password'])){
            apiResponse(
                ['massage' => 'User logged in successfully',
                    'token'=>$user->api_token]);
        }
        apiResponse([
            'errors'=>[
                'massage' => 'User not found',
            ],
        ],401);

    }
    public function show()
    {
        $user = Auth::user();
        apiResponse([
            'user' => $user,
        ],200);
    }
}