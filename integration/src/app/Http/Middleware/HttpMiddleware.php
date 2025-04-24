<?php
namespace App\Http;

use App\Http\Middleware\ClientAuth;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class HttpMiddleware
{
    /**
     * Register middleware for HTTP requests.
     *
     * @var array
     */
    public $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    public $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Cache\Middleware\CacheResponse::class,
        'can' => \App\Http\Middleware\Authorize::class,
        'client.auth' => ClientAuth::class,  // Registering the custom middleware
    ];
}
