<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Models\Article;
use Livewire\Volt\Volt;
use App\Livewire\AiPlayground;
use App\Http\Controllers\AiSseController;
use App\Http\Controllers\ConversationController;


Route::get('/', fn() => view('pages.home'))->name('home');

// Route::get('/', function () {
//     return view('pages.home');
// })->name('pages.home');


// routes/web.php

Route::get('/ai/playground', AiPlayground::class)->middleware('auth')->name('ai.playground');


Route::middleware(['auth'])->group(function () {

    //     // Conversation Routes
    //     Route::post('/conversations', [ConversationController::class, 'create']);
    //     Route::get('/conversations/{conversation}', [ConversationController::class, 'show']);
    //     Route::post('/conversations/{conversation}/message', [ConversationController::class, 'postMessage']);

    //     // SSE Stream Route
    //     Route::get('/ai/stream', [AiSseController::class, 'stream'])->name('ai.sse.stream');
    Route::view('/ai', 'ai.index')->name('ai.index');

    // **Unified Conversation & Streaming API Routes**
    // These routes are used by the Livewire ChatComponent and ImageEditUploader

    // SSE Stream Route (Used by Livewire component for streaming response)
    Route::get('/ai/stream', [AiSseController::class, 'stream'])->name('ai.sse.stream');

    // Conversation API Routes (for creation/retrieval/messaging)
    Route::post('/ai/conversations', [ConversationController::class, 'create'])->name('ai.conversation.create');
    Route::post('/ai/conversations/{conversation}/message', [ConversationController::class, 'postMessage'])->name('ai.conversation.message');
    Route::get('/ai/conversations/{conversation}', [ConversationController::class, 'show'])->name('ai.conversation.show');
});



/** AI frontend page */
// Route::middleware(['auth'])->group(function () {
//     Route::view('/ai', 'ai.index')->name('ai.index');

//     // SSE stream for GPT streaming responses
//     Route::get('/ai/stream', [AiSseController::class, 'stream'])->name('ai.sse.stream');

//     // conversation routes
//     Route::post('/ai/conversations', [ConversationController::class, 'create'])->name('ai.conversation.create');
//     Route::post('/ai/conversations/{conversation}/message', [ConversationController::class, 'postMessage'])->name('ai.conversation.message');
//     Route::get('/ai/conversations/{conversation}', [ConversationController::class, 'show'])->name('ai.conversation.show');

//     // For convenience you can mount Livewire directly in blade; not necessary to route components
// });


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

require __DIR__ . '/auth.php';
