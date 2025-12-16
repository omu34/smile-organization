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

    protected $appends = ['full_media_url'];

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

    // public function getFullMediaAttribute(): string
    // {
    //     // ✅ FIX: Use $this->media_url, which exists in your database
    //     if (Str::startsWith($this->media_url, ['http', '/storage'])) {
    //         return $this->media_url;
    //     }

    //     // ✅ FIX: Use $this->media_url
    //     return asset('storage/' . ltrim($this->media_url, '/'));
    // }
     public function getFullMediaUrlAttribute(): ?string
    {
        if (empty($this->media_url)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->media_url, ['http', '/storage'])) {
            return $this->media_url;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->media_url, '/'));
    }


     public function getFullThumbnailUrlAttribute(): ?string
    {
        if (empty($this->thumbnail_url)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->thumbnail_url, ['http', '/storage'])) {
            return $this->thumbnail_url;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->thumbnail_url, '/'));
    }
}
