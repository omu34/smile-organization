<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'page_slug',
        'is_active',
    ];

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }

    // Helper method to fetch slider by page slug
    public static function forPage(string $slug): ?self
    {
        return self::where('page_slug', $slug)
            ->with('slides')
            ->first();
    }
}

