<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 use App\Models\NavigationMenu;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


public function boot()
{
    View::composer('*', function ($view) {
        $menus = NavigationMenu::where('is_active', true)->orderBy('order')->get();
        $view->with('menus', $menus);
    });
}
}
