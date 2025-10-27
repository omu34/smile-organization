<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavigationMenu;
use App\Models\NavigationItem;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update main navigation menu
        $menu = NavigationMenu::updateOrCreate(
            ['slug' => 'main'],
            ['name' => 'Main Menu', 'is_active' => true, 'order' => 1]
        );

        // 🏠 Home
        $home = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Home'],
            [
                'slug' => 'home',
                'url' => '/',
                'label' => 'Go to homepage',
                'target' => '_self',
                'order' => 1,
                'is_active' => true,
                'parent_id' => null,
            ]
        );

        // ℹ️ About
        $about = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'About'],
            [
                'slug' => 'about',
                'url' => '/about',
                'label' => 'Learn more about us',
                'target' => '_self',
                'order' => 2,
                'is_active' => true,
                'parent_id' => null,
            ]
        );

        // ⚙️ Services
        $services = NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Services'],
            [
                'slug' => 'services',
                'url' => '/services',
                'label' => 'Our services',
                'target' => '_self',
                'order' => 3,
                'is_active' => true,
                'parent_id' => null,
            ]
        );

        // 🧩 Sub-items under Services
        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Consulting'],
            [
                'slug' => 'consulting',
                'url' => '/services/consulting',
                'label' => 'Consulting services',
                'target' => '_self',
                'order' => 1,
                'is_active' => true,
                'parent_id' => $services->id,
            ]
        );

        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Development'],
            [
                'slug' => 'development',
                'url' => '/services/development',
                'label' => 'Development projects',
                'target' => '_self',
                'order' => 2,
                'is_active' => true,
                'parent_id' => $services->id,
            ]
        );

        // ✉️ Contact
        NavigationItem::updateOrCreate(
            ['navigation_menu_id' => $menu->id, 'title' => 'Contact'],
            [
                'slug' => 'contact',
                'url' => '/contact',
                'label' => 'Reach out to us',
                'target' => '_self',
                'order' => 4,
                'is_active' => true,
                'parent_id' => null,
            ]
        );
    }
}
