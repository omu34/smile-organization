<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavigationMenu;
use App\Models\NavigationItem;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        $gettingStarted = NavigationMenu::firstOrCreate(
            ['slug' => 'getting-started'],
            ['name' => 'Getting Started', 'order' => 1, 'is_active' => true]
        );

        // Top-level items with nested children example
        $vision = NavigationItem::firstOrCreate(
            ['navigation_menu_id' => $gettingStarted->id, 'label' => 'Vision', 'section_id' => 'section4'],
            ['description' => 'Advocating for the needs and rights of children with neurological conditions.', 'order' => 1]
        );

        $impact = NavigationItem::firstOrCreate(
            ['navigation_menu_id' => $gettingStarted->id, 'label' => 'Impact', 'section_id' => 'section2'],
            ['description' => 'Positive community advocacy.', 'order' => 2]
        );

        // Learn more menu with a nested multi-level example
        $learnMore = NavigationMenu::firstOrCreate(['slug'=>'learn-more'], ['name'=>'Learn More','order'=>2,'is_active'=>true]);

        $partners = NavigationItem::firstOrCreate(
            ['navigation_menu_id' => $learnMore->id, 'label' => 'Partners'],
            ['description' => 'How our partners support us', 'section_id' => 'section5', 'order' => 1]
        );

        // child items for Partners
        NavigationItem::firstOrCreate(
            ['navigation_menu_id' => $learnMore->id, 'parent_id' => $partners->id, 'label' => 'Partner Stories'],
            ['description' => 'Testimonials and case studies', 'href' => '/partners/stories', 'order' => 1]
        );

        NavigationItem::firstOrCreate(
            ['navigation_menu_id' => $learnMore->id, 'label' => 'Resources'],
            ['description' => 'Educational materials', 'section_id' => 'section3', 'order' => 2]
        );

        NavigationMenu::firstOrCreate(['slug'=>'about-us'], ['name'=>'About Us','order'=>3,'is_active'=>true]);
    }
}
