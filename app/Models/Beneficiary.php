<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Beneficiary extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'description',
        'published_at',
        'is_published',
    ];

    protected $casts = [
    'published_at' => 'datetime',
    'is_published' => 'boolean',
];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    // 👇 ensures the computed attribute appears in array/JSON form
    protected $appends = ['full_image_path'];

    /**
     * Accessor for full_image_path
     *
     * Returns the full public URL for the uploaded image.
     */
    public function getFullImagePathAttribute(): ?string
    {
        $imagePath = $this->image_path; // ✅ your actual column name

        if (!$imagePath) {
            return null;
        }

        // If already a full URL or starts with storage, return as-is
        if (Str::startsWith($imagePath, ['http', '/storage'])) {
            return $imagePath;
        }

        // Otherwise, build full asset path
        return asset('storage/' . ltrim($imagePath, '/'));
    }
}
