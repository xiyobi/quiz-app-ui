<?php

namespace App\Http\Controllers\WEB;


use JetBrains\PhpStorm\NoReturn;

class HomeController
{
    public function home(): void
    {
        view("home");
    }
    public function about(): void
    {
        view("about");
    }
    public function login(): void
    {
        view("auth/login");
    }
    public function register(): void
    {
        view("auth/register");
    }
    public function take_quiz(string $uniqueValue): void
        {
            view("quiz/take_quiz");
        }

}