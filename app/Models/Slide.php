<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage; // 👈 Import Storage
use Illuminate\Support\Str; // 👈 Import Str

class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'slider_id', 'title', 'description', 'image_url',
        'button_text', 'button_link', 'position', 'is_active'
    ];

    /**
     * Add an appended attribute for the full image URL.
     */
    protected $appends = ['full_image_url'];

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }

    /**
     * Accessor for getFullImageUrlAttribute
     *
     * This automatically creates the 'full_image_url' attribute.
     */

    public function getFullImageUrlAttribute(): string
    {
        // Check if image_url is already a full URL (e.g., http://) or starts with /storage
        if (Str::startsWith($this->image_url, ['http', '/storage'])) {
            return $this->image_url;
        }

        // Otherwise, assume it's a relative path from the 'public' disk
        // and generate a URL to it using the asset helper (avoid calling Filesystem::url()).
        return asset('storage/' . ltrim($this->image_url, '/'));
    }
}

