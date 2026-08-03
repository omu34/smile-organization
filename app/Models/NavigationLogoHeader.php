<?php

namespace App\Models;

use App\Events\FooterUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NavigationLogoHeader extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected static function booted(): void
    {
        static::saved(fn () => broadcast(new FooterUpdated())->toOthers());
        static::deleted(fn () => broadcast(new FooterUpdated())->toOthers());
    }

    protected $fillable = [
        'logo_path',
        'link',
    ];

    protected $appends = [
        'full_logo_path',
        'full_link_url',
    ];

    /**
     * Accessor: Get the full logo URL.
     */

    public function getFullLogoPathAttribute(): ?string
    {
        return $this->getFirstMediaUrl('logo_images')
            ?? $this->getLegacyLogoPath();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo_images')
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

    protected function getLegacyLogoPath(): ?string
    {
        if (empty($this->logo_path)) {
            return null;
        }

        if (Str::startsWith($this->logo_path, ['http', '/storage'])) {
            return $this->logo_path;
        }

        return asset('storage/' . ltrim($this->logo_path, '/'));
    }

    /**
     * Accessor: Get the full link URL.
     */
    public function getFullLinkUrlAttribute(): ?string
    {
        $link = $this->link;

        if (!$link) {
            return null;
        }

        // Already valid
        if (Str::startsWith($link, ['http://', 'https://'])) {
            return $link;
        }

        // Internal path
        return url($link);
    }

    /**
     * Mutator: Ensure valid protocol for link.
     */
    public function setLinkAttribute($value): void
    {
        if (!empty($value) && !Str::startsWith($value, ['http://', 'https://'])) {
            $this->attributes['link'] = 'https://' . $value;
        } else {
            $this->attributes['link'] = $value;
        }
    }
}
