<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\FooterUpdated;
use Illuminate\Support\Str;

class SocialLink extends Model
{
    protected $fillable = [
        'platform_name',
        'url',
        'image_path',
        'is_active',
        'order',
    ];

    protected $appends = ['full_image_path'];

    protected static function booted(): void
    {
        static::saved(fn () => event(new FooterUpdated()));
        static::deleted(fn () => event(new FooterUpdated()));
    }


    public function getFullImagePathAttribute(): string
    {
        // Check if image_url is already a full URL (e.g., http://) or starts with /storage
        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        // Otherwise, assume it's a relative path from the 'public' disk
        // and generate a URL to it using the asset helper (avoid calling Filesystem::url()).
        return asset('storage/' . ltrim($this->image_path, '/'));
    }

}
