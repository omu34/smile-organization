<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class NavigationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'navigation_menu_id',
        'parent_id',
        'label',
        'description',
        'href',
        'section_id',
        'order',
        'is_active',
    ];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('navigation_menus_active'));
        static::deleted(fn() => Cache::forget('navigation_menus_active'));
    }

    public function menu()
    {
        return $this->belongsTo(NavigationMenu::class, 'navigation_menu_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }
}
