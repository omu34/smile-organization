<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FeaturedArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'media_type',
        'media_url',
        'thumbnail_url',
        'is_featured',
    ];

    protected $appends = ['full_image_url'];

    public function getYoutubeIdAttribute(): ?string
    {
        if ($this->media_type === 'youtube' && $this->media_url) {
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^\s&]+)/', $this->media_url, $matches);
            return $matches[1] ?? null;
        }
        return null;
    }


    /**
     * Accessor for getFullImageUrlAttribute
     *
     * This automatically creates the 'full_image_url' attribute.
     */

    public function getFullImageUrlAttribute(): string
    {
        // ✅ FIX: Use $this->media_url, which exists in your database
        if (Str::startsWith($this->media_url, ['http', '/storage'])) {
            return $this->media_url;
        }

        // ✅ FIX: Use $this->media_url
        return asset('storage/' . ltrim($this->media_url, '/'));
    }
}
