<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slide extends Model
{
    /** @use HasFactory<\Database\Factories\SlideFactory> */
    use HasFactory;

      protected $fillable = [
        'slider_id', 'title', 'description', 'image_url',
        'button_text', 'button_link', 'position', 'is_active'
    ];

     public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }
}
