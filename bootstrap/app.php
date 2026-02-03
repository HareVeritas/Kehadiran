<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
<<<<<<< HEAD
=======
        api: __DIR__.'/../routes/api.php',
>>>>>>> 2d80d6bd139d07824956b75836a66502698209b8
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
<<<<<<< HEAD
=======
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
>>>>>>> 2d80d6bd139d07824956b75836a66502698209b8
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
