<?php

namespace App\Http\Controllers\WEB;

class HomeController {
    public function home (): void {
        view('home');
    }
    public function about (): void {
        view('about');
    }
    public function login () {
        view('auth/login');
    }
    public function register () {
        view('auth/register');
    }
}