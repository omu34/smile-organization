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
        if (empty($this->image_url)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->image_url, ['http', '/storage'])) {
            return $this->image_url;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->image_url, '/'));
    }
}
