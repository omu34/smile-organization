<?php

namespace App\Providers;

use App\Models\Gallery;
use App\Models\NavigationMenu;
use App\Observers\GalleryObserver;
use App\Services\OpenAI\OpenAIService;
use App\Services\OpenAI\OpenAIServiceInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share navigation menus with all views
        View::composer('*', function ($view) {
            // You might want to cache this query to avoid running it on every request
            $menus = NavigationMenu::where('is_active', true)->orderBy('order')->get();
            $view->with('menus', $menus);
        });

        // Register Gallery observer for real-time media updates
        Gallery::observe(GalleryObserver::class);
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
