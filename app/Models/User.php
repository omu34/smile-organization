<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use   HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'phone',
        'avatar',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }


    /**
     * Determines if the user can access the Filament admin panel.
     * 2. The method signature MUST accept "Panel $panel"
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // 🚀 SIMPLE ACCESS CHECK
        return $this->email === 'emoyocarol@gmail.com';
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Determine if the user can access the Filament admin panel.
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<\App\Models\GeneratedAsset>
     */
    public function generatedAssets(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(
            \App\Models\GeneratedAsset::class,
            'owner'
        );
    }
}
