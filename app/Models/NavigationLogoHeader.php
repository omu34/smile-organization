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
        if (empty($this->logo_path)) {
            return null;
        }

        // If it's already a full URL, return it
        if (Str::startsWith($this->logo_path, ['http', '/storage'])) {
            return $this->logo_path;
        }

        // Otherwise, generate the full URL from the public storage disk
        return asset('storage/' . ltrim($this->logo_path, '/'));
    }






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
