<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Events\ResourceUpdated;

class ResourceItem extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'extra_description',
        'image_path',
        'video_path',
        'alignment',
        'is_published',
        'platform_name',
        'url',
        'position',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Automatically broadcast an update event after saving.
     */
    protected static function booted(): void
    {
        static::saved(fn() => broadcast(new ResourceUpdated));
    }

    /**
     * Append accessors to model JSON output.
     */
    protected $appends = [
        'full_image_path',
        'full_video_path',
    ];

    /**
     * Configure slug generation options.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Accessor for the full image URL.
     */
    public function getFullImagePathAttribute(): ?string
    {
        return $this->getFirstMediaUrl('resource_images')
            ?? $this->getLegacyImagePath();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('resource_images')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);

        $this->addMediaCollection('resource_videos')
            ->singleFile()
            ->acceptsMimeTypes(['video/mp4', 'video/webm', 'video/quicktime']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(640)
            ->height(480)
            ->sharpen(10);
    }

    protected function getLegacyImagePath(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        return asset('storage/' . ltrim($this->image_path, '/'));
    }

    /**
     * Accessor for the full video URL.
     */
    public function getFullVideoPathAttribute(): ?string
    {
        if (!$this->video_path) {
            return null;
        }

        if (Str::startsWith($this->video_path, ['http', '/storage'])) {
            return $this->video_path;
        }

        return asset('storage/' . ltrim($this->video_path, '/'));
    }
}
