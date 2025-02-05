<?php

namespace Src\middlewares;

use Src\middlewares\Middleware;

class AuthMiddleware implements Middleware {

    public function handle (): void {
        \Src\Auth::check();
    }
}