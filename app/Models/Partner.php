<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Partner extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'name',
        'slug',
        'logo_path',
        'testimonial',
        'rating',
        'reviews_count',
        'website_url',
        'is_featured',
    ];

        protected $casts = [
        'is_featured' => 'boolean',
    ];

    // 👇 this makes sure 'full_logo' shows in JSON, Filament, etc.
    protected $appends = ['full_logo'];

    /**
     * Accessor for full_logo
     */
    public function getFullLogoAttribute(): ?string
    {
        $logo = $this->logo_path; // ✅ adjust if your column name differs

        if (!$logo) {
            return null;
        }

        // If already a full URL or /storage path, return as-is
        if (Str::startsWith($logo, ['http', '/storage'])) {
            return $logo;
        }

        // Otherwise, generate full public URL
        return asset('storage/' . ltrim($logo, '/'));
    }

    protected  function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}


