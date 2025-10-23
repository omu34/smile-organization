<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavigationMenu extends Model
{
    protected $fillable = ['name', 'slug', 'is_active', 'order'];

    public function items(): HasMany
    {
        return $this->hasMany(NavigationItem::class)->whereNull('parent_id')->orderBy('order');
    }
}
