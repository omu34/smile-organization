<?php

namespace App\Models;

use App\Events\WhyUsUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WhyUsItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected static function booted(): void
    {
        static::saved(fn () => broadcast(new WhyUsUpdated())->toOthers());
        static::deleted(fn () => broadcast(new WhyUsUpdated())->toOthers());
    }

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'order',
    ];


    protected $appends = ['full_image_url'];

    // public function getFullImageUrlAttribute(): ?string
    // {
    //     if (empty($this->image_path)) {
    //         return null;
    //     }

    //     // If it's already a full URL, return it
    //     if (Str::startsWith($this->image_path, ['http', '/storage'])) {
    //         return $this->image_path;
    //     }

    //     // Otherwise, generate the full URL from the public storage disk
    //     return asset('storage/' . ltrim($this->image_path, '/'));
    // }



     public function getFullImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('why_us_images')
            ?? $this->getLegacyImageUrl();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('why_us_images')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(200)
            ->height(200)
            ->sharpen(10);
    }

    protected function getLegacyImageUrl(): ?string
    {
        if (empty($this->image_url)) {
            return null;
        }

        if (Str::startsWith($this->image_url, ['http', '/storage'])) {
            return $this->image_url;
        }

        return asset('storage/' . ltrim($this->image_url, '/'));
    }
}
