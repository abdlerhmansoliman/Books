<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\EnsureUserMiddleware;
use App\Http\Middleware\SetLocale;
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
            'admin' => AdminMiddleware::class,
            'ensureUser' => EnsureUserMiddleware::class,


            'setLocale' => SetLocale::class,
        ]);
        $middleware->group('web', [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            SetLocale::class, 
        ]);
 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
