<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getImageUrlAttribute(): string
{
    return $this->image
        ? asset('storage/' . $this->image)
        : asset('images/placeholder.jpg'); // fallback
}

}
