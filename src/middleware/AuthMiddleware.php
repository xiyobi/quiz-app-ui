<?php

namespace Src\middleware;

use Src\middleware\Middleware;

class AuthMiddleware implements Middleware
{
    public function handle():void
    {
        \Src\Auth::check();
    }
}