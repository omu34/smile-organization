<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Slider extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    /**
     * Configure slug generation.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Relationship: Slider → Slides
     */
    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }

    /**
     * Helper method to fetch slider by slug.
     */
    public static function forSlug(string $slug): ?self
    {
        return self::where('slug', $slug)
            ->with(['slides' => function ($query) {
                $query->where('is_active', true)->orderBy('position');
            }])
            ->first();
    }
}

