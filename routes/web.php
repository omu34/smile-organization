<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Models\Article;
use Livewire\Volt\Volt;
use App\Livewire\ChatBot;
use App\Livewire\ProductSearch;

Route::middleware(['auth'])->group(function(){
    Route::get('/ai/chat', ChatBot::class)->name('ai.chat');
    Route::get('/ai/products', ProductSearch::class)->name('ai.products');
});


Route::get('/', fn() => view('pages.home'))->name('home');

// Route::get('/', function () {
//     return view('pages.home');
// })->name('pages.home');

Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');

Route::get('/articles/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->with('media')->firstOrFail();
    return view('articles.show', compact('article'));
})->name('articles.show');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
