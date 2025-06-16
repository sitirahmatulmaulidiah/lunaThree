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
        // Daftarkan middleware alias Anda di sini
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            // 'guest' dan 'auth' biasanya sudah terdaftar secara otomatis
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
