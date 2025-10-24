<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\FooterUpdated;

class SocialLink extends Model
{
    protected $fillable = [
        'platform_name',
        'url',
        'image_path',
        'is_active',
        'order',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => event(new FooterUpdated()));
        static::deleted(fn () => event(new FooterUpdated()));
    }

    public function getImageUrlAttribute(): string
{
    return $this->image_path
        ? asset('storage/' . $this->image_path)
        : asset('socials/placeholder.jpg'); // fallback
}

}
