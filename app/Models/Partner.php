<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'testimonial',
        'rating',
        'reviews_count',
        'website_url',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];


    public function getImageUrlAttribute(): string
{
    return $this->logo
        ? asset('storage/' . $this->logo)
        : asset('logos/placeholder.jpg'); // fallback
}

}
