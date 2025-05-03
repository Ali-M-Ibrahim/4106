<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'first-post',
            "createm3",
            'createm4',
            "updatem2/*",
            "updatem3/*"
        ]);

        //global middleware:  this will be applied on all http request
//        $middleware->append(\App\Http\Middleware\CheckAuth::class);

        $middleware->alias([
            'check' => \App\Http\Middleware\CheckAuth::class,
            'admin' => \App\Http\Middleware\CheckAdmin::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
