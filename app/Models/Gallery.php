<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function getImageUrlAttribute(): ?string
    {
        $path = $this->getAttribute('image_path');

        if (! $path) {
            return null;
        }

        return asset('storage/' . $path);
    }

    // Spatie Slug configuration
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}




