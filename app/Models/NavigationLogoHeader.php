<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NavigationLogoHeader extends Model
{
     use HasFactory;
    protected $fillable = [
        'logo',
        'link',

    ];

    /**
     * Get the URL for the logo.
     */
    protected function getLogoUrlAttribute(): ?string // 💡 use nullable string for safety
    {
        // Return null if the 'logo' attribute is empty, to prevent errors.
        if (empty($this->attributes['logo'])) {
            return null;
        }

        return Storage::url($this->attributes['logo']);
    }

    /**
     * Mutator to ensure the link has a valid protocol prefix.
     */
    protected function setLinkAttribute(string $value): void
    {
        if (!Str::startsWith($value, ['http://', 'https://'])) {
            $this->attributes['link'] = 'https://' . $value;
        } else {
            $this->attributes['link'] = $value;
        }
    }



}
