<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Gallery extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'image_path',
        'description',
        'is_featured',
    ];

    protected $appends = ['full_image_path'];
    public function getFullImageUrlAttribute(): string
    {
        // Check if image_path is already a full URL (e.g., http://) or starts with /storage
        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        // Otherwise, assume it's a relative path from the 'public' disk
        // and generate a URL to it using the asset helper (avoid calling Filesystem::url()).
        return asset('storage/' . ltrim($this->image_path, '/'));
    }

    // Spatie Slug configuration
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}




