<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getYoutubeIdAttribute(): ?string
    {
        if ($this->media_type === 'youtube' && $this->media_url) {
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^\s&]+)/', $this->media_url, $matches);
            return $matches[1] ?? null;
        }
        return null;
    }
}
