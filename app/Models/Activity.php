<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
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
        if (empty($this->image)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->image, ['http', '/storage'])) {
            return $this->image;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->image, '/'));
    }
}
