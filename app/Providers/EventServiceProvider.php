<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    protected $listen = [
        'eloquent.created: App\Models\Gallery' => [
            \App\Listeners\BroadcastGalleryUpdate::class,
        ],
        'eloquent.updated: App\Models\Gallery' => [
            \App\Listeners\BroadcastGalleryUpdate::class,
        ],
        'eloquent.deleted: App\Models\Gallery' => [
            \App\Listeners\BroadcastGalleryUpdate::class,
        ],
    ];



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
