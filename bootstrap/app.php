<?php

use App\Http\Middleware\CheckUserAccess;
use App\Http\Middleware\SaveLastRoute;
use App\Http\Middleware\UserAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user-access'       => UserAccess::class,
            'user-access-self'  => CheckUserAccess::class
        ]);
        
        // $middleware->global([
        //     SaveLastRoute::class
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
