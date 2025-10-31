<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Gallery extends Model
{
    use HasFactory, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'category',
        'image_path',
        'description',
        'is_featured',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_image_path'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Accessor for full_image_path
     *
     * This automatically creates the 'full_image_path' attribute
     * by pointing to the file in the public storage.
     */
    public function getFullImagePathAttribute(): ?string
    {
        if (empty($this->image_path)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->image_path, ['http', '/storage'])) {
            return $this->image_path;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}



