<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Empowerment' => [
                'title' => 'Tri-Cycles Distribution',
                'description' => 'Empowering children with special needs with tri-cycles.',
                'image_path' => 'imagess/raniss.jpg',
            ],
            'Art & Education' => [
                'title' => 'Inclusive Art Workshop',
                'description' => 'Promoting inclusivity through creative art sessions.',
                'image_path' => 'imagess/aboyseducation.jpg',
            ],
            'Community' => [
                'title' => 'Narok County Outreach',
                'description' => 'Community outreach for awareness and inclusion.',
                'image_path' => 'imagess/narok.jpg',
            ],
        ];

        foreach ($categories as $category => $baseItem) {
            for ($i = 1; $i <= 3; $i++) {
                Gallery::updateOrCreate(
                    ['slug' => Str::slug("{$baseItem['title']}-{$i}")],
                    [
                        'title' => "{$baseItem['title']} #{$i}",
                        'description' => $baseItem['description'] . " (Gallery item {$i})",
                        'image_path' => $baseItem['image_path'],
                        'category' => $category,
                        'is_featured' => $i === 1,
                    ]
                );
            }
        }
    }
}
