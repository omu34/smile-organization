<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NavigationLogoHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'link',
    ];

    protected $appends = [
        'full_logo_path',
        'full_link_url',
    ];

    /**
     * Accessor: Get the full logo URL.
     */

    public function getFullLogoPathAttribute(): ?string
    {
        if (!$this->logo_path) {
            return null;
        }

        if (Str::startsWith($this->logo_path, ['http://', 'https://', '/storage'])) {
            return $this->logo_path;
        }

        return asset('storage/' . ltrim($this->logo_path, '/'));
    }
    // public function getFullLogoPathAttribute(): ?string
    // {
    //     $logo = $this->logo_path;

    //     if (!$logo) {
    //         return null;
    //     }

    //     // Already a valid URL or public path
    //     if (Str::startsWith($logo, ['http://', 'https://', '/storage'])) {
    //         return $logo;
    //     }

    //     // Build full URL from storage
    //     return asset('storage/' . ltrim($logo, '/'));
    // }






    /**
     * Accessor: Get the full link URL.
     */
    public function getFullLinkUrlAttribute(): ?string
    {
        $link = $this->link;

        if (!$link) {
            return null;
        }

        // Already valid
        if (Str::startsWith($link, ['http://', 'https://'])) {
            return $link;
        }

        // Internal path
        return url($link);
    }

    /**
     * Mutator: Ensure valid protocol for link.
     */
    public function setLinkAttribute($value): void
    {
        if (!empty($value) && !Str::startsWith($value, ['http://', 'https://'])) {
            $this->attributes['link'] = 'https://' . $value;
        } else {
            $this->attributes['link'] = $value;
        }
    }
}
