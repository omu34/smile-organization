<?php

namespace App\Models;

use App\Events\PartnerUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Partner extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected static function booted(): void
    {
        static::saved(fn () => broadcast(new PartnerUpdated())->toOthers());
        static::deleted(fn () => broadcast(new PartnerUpdated())->toOthers());
    }
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
        return $this->getFirstMediaUrl('partner_logo')
            ?? $this->getLegacyLogoUrl();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('partner_logo')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(300)
            ->height(300)
            ->sharpen(10);
    }

    protected function getLegacyLogoUrl(): ?string
    {
        $logo = $this->logo_path;

        if (!$logo) {
            return null;
        }

        if (Str::startsWith($logo, ['http', '/storage'])) {
            return $logo;
        }

        return asset('storage/' . ltrim($logo, '/'));
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}


