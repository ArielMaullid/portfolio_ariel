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
        //
    })
        ->withExceptions(function (Exceptions $exceptions) {
        // View error custom akan otomatis dipakai oleh Laravel
        // jika file resources/views/errors/{code}.blade.php ada.
    })->create();