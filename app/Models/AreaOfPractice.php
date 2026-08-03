<?php

namespace App\Models;

use App\Events\AreaOfPractice as AreaOfPracticeUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AreaOfPractice extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [        
        'subtitle',
        'button_name',
        'url',
        'image_path',
        'is_active',
        'order',
    ];

    protected $appends = ['full_image_path'];

    protected static function booted(): void
    {
        static::saved(fn () => event(new AreaOfPracticeUpdated()));
        static::deleted(fn () => event(new AreaOfPracticeUpdated()));
    }


    public function getFullImagePathAttribute(): ?string
    {
        return $this->getFirstMediaUrl('area_images')
            ?? $this->getLegacyImagePath();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('area_images')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(320)
            ->height(240)
            ->sharpen(10);
    }

    protected function getLegacyImagePath(): ?string
    {
        if (empty($this->image_path)) {
            return null;
        }

        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}
