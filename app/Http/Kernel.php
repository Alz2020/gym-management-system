<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        // 'admin'=> \App\Http\Middleware\AdminMiddleware::class,
        'is_admin' => \App\Http\Middleware\IsAdmin::class,

    ];
}
