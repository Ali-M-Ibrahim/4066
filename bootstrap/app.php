<?php

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
        $middleware->validateCsrfTokens(except: [
            'post',
            'put',
            "createm3",
            "createm4",
            "updatem2/*"

        ]);

//        $middleware->append(\App\Http\Middleware\CheckAuthentication::class);

        $middleware->alias([
            'checkauth'=> \App\Http\Middleware\CheckAuthentication::class,
            'checkadmin'=> \App\Http\Middleware\CheckAdmin::class

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
