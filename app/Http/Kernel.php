<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckUserSession;

class Kernel extends HttpKernel
{
    protected $middleware = [
    ];

    protected $middlewareGroups = [
        'web' => [
        ],

        'api' => [
        ],
    ];

    protected $routeMiddleware = [
      'check.user.session' => CheckUserSession::class,
    ];
}