<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NavigationMenu;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\View;
use App\Services\OpenAI\OpenAIServiceInterface;
use App\Services\OpenAI\OpenAIService;


use Illuminate\Support\Facades\Auth; // <-- Import the Auth facade

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // app/Providers/AppServiceProvider.php (register method)

    $this->app->bind(OpenAIServiceInterface::class, OpenAIService::class);

    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void // <-- Combine all logic into one boot method
    {
        // Share navigation menus with all views
        View::composer('*', function ($view) {
            // You might want to cache this query to avoid running it on every request
            $menus = NavigationMenu::where('is_active', true)->orderBy('order')->get();
            $view->with('menus', $menus);
        });

        // Set custom Filament authentication check
        // Filament::serving(function () {
        //     // Ensure user is authenticated and has admin role
        //     if (!Auth::check() || !Auth::user()->hasRole('admin')) {
        //         return false;
        //     }
        // });
    }
}
