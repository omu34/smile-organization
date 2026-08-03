<?php

namespace App\Models;

use App\Events\ActivityUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Activity extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory, InteractsWithMedia;

    protected static function booted(): void
    {
        static::saved(fn () => broadcast(new ActivityUpdated())->toOthers());
        static::deleted(fn () => broadcast(new ActivityUpdated())->toOthers());
    }

    protected $fillable = [
        'title',
        'image',
        'subtitle',
        'description',
        'extra_description',
        'button_text',
        'button_link',
        'order',
        'is_visible',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_image'];

    /**
     * Accessor for full_image
     *
     * This automatically creates the 'full_image' attribute
     * by pointing to the file in the public storage.
     */
    public function getFullImageAttribute(): ?string // Renamed to match 'full_image'

    {
        return $this->getFirstMediaUrl('activity_images')
            ?? $this->getLegacyImageUrl();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('activity_images')
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

    protected function getLegacyImageUrl(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        if (Str::startsWith($this->image, ['http', '/storage'])) {
            return $this->image;
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }
}
