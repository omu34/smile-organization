<?php

namespace App\Providers;

use App\Models\NavigationMenu;
use App\Services\OpenAI\OpenAIService;
use App\Services\OpenAI\OpenAIServiceInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
 use Illuminate\Support\Facades\Gate;
use App\Models\User; // Make sure to import your User model
// <-- Import the Auth facade

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        if (class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        // $this->app->register(TelescopeServiceProvider::class);
        $this->app->bind(OpenAIServiceInterface::class, OpenAIService::class);
    }
        // app/Providers/AppServiceProvider.php (register method)
        
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void// <-- Combine all logic into one boot method
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
    
        
       

/**
 * Register the Telescope gate.
 *
 * This gate determines who can access Telescope in non-local environments.
 */
protected function gate(): void
{
    Gate::define('viewTelescope', function (User $user) {
        return in_array($user->email, [
            'admin@example.com',
            'anotheradmin@example.com',
        ]);
    });
}

}
