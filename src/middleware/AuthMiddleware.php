<?php

namespace Src\middleware;

use Src\Auth as apiAuth;

class Auth
{
    public function handle()
    {
        apiAuth::check();
    }
}