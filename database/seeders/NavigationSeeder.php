<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavigationMenu;
use App\Models\NavigationItem;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        $menu = NavigationMenu::updateOrCreate(
            ['slug' => 'main'],
            ['name' => 'Main Menu', 'is_active' => true, 'order' => 1]
        );

        // Top-level items
        $home = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Home'],
            ['url' => '/', 'order' => 1, 'is_active' => true]
        );

        $about = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'About'],
            // we set slug to use route helper later, or set url to '/about'
            ['slug' => 'about', 'url' => '/about', 'order' => 2, 'is_active' => true]
        );

        $services = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Services'],
            ['order' => 3, 'is_active' => true]
        );

        // Add children to Services
        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Consulting'],
            ['parent_id' => $services->id, 'url' => '/services/consulting', 'order' => 1, 'is_active' => true]
        );

        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Development'],
            ['parent_id' => $services->id, 'url' => '/services/development', 'order' => 2, 'is_active' => true]
        );

        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Contact'],
            ['url' => '/contact', 'order' => 4, 'is_active' => true]
        );
    }
}
