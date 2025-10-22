<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class NavigationMenu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'order', 'is_active'];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('navigation_menus_active'));
        static::deleted(fn() => Cache::forget('navigation_menus_active'));
    }

    public function items()
    {
        // top-level items (parent_id = null)
        return $this->hasMany(NavigationItem::class)
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    // all items if needed
    public function allItems()
    {
        return $this->hasMany(NavigationItem::class)->orderBy('order');
    }
}
