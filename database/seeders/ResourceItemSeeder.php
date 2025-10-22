<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResourceItem;
use Illuminate\Support\Str;

class ResourceItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Tri-Cycles',
                'description' => 'SFN is dedicated to empowering individuals with disabilities by providing essential resources, including wheelchairs...',
                'extra_description' => 'SFN provides wheelchairs as part of its commitment to enhancing mobility and independence...',
                'image_path' => 'images/resource1.jpg',
                'alignment' => 'left',
                'position' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Diapers',
                'description' => 'SFN recognizes the unique challenges faced by caregivers of children with disabilities...',
                'extra_description' => 'This support contributes to improved hygiene, health, and quality of life...',
                'image_path' => 'images/diaperss.jpg',
                'alignment' => 'right',
                'position' => 2,
                'published_at' => now(),
            ],
            [
                'title' => 'White Cane, Malacca Cane, Wheel Chairs',
                'description' => 'SFN is committed to enhancing the lives of people with visual impairments...',
                'extra_description' => 'By equipping individuals with these resources, we aim to create a more inclusive society...',
                'image_path' => 'images/resource.jpg',
                'alignment' => 'left',
                'position' => 3,
                'published_at' => now(),
            ],
        ];

        foreach ($items as $item) {
            ResourceItem::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                $item
            );
        }
    }
}
