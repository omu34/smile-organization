<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // RateLimiter::for('ai-request', function (Request $request) {
        //     $user = $request->user();
        //     $key = $user ? 'ai-request-user-' . $user->id : 'ai-request-ip-' . $request->ip();

        //     return Limit::perMinute(10)->by($key);
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
