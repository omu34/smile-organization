<?php

namespace App\Models;

use App\Events\BeneficiaryUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Beneficiary extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected static function booted(): void
    {
        static::saved(fn () => broadcast(new BeneficiaryUpdated())->toOthers());
        static::deleted(fn () => broadcast(new BeneficiaryUpdated())->toOthers());
    }

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
        return $this->getFirstMediaUrl('beneficiary_images')
            ?? $this->getLegacyImagePath();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('beneficiary_images')
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

    protected function getLegacyImagePath(): ?string
    {
        $imagePath = $this->image_path;

        if (!$imagePath) {
            return null;
        }

        if (Str::startsWith($imagePath, ['http', '/storage'])) {
            return $imagePath;
        }

        return asset('storage/' . ltrim($imagePath, '/'));
    }
}
