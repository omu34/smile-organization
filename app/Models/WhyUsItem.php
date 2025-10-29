<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WhyUsItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'order',
    ];


    protected $appends = ['full_image_url'];
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
