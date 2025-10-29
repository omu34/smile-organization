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
                'image_path' => 'images/raniss.jpg',
            ],
            'Art & Education' => [
                'title' => 'Inclusive Art Workshop',
                'description' => 'Promoting inclusivity through creative art sessions.',
                'image_path' => 'images/aboyseducation.jpg',
            ],
            'Community' => [
                'title' => 'Narok County Outreach',
                'description' => 'Community outreach for awareness and inclusion.',
                'image_path' => 'images/narok.jpg',
            ],
        ];

        foreach ($categories as $category => $baseItem) {
            for ($i = 1; $i <= 3; $i++) {
                Gallery::create([
                    'title' => "{$baseItem['title']} #{$i}",
                    'description' => $baseItem['description'] . " (Gallery item {$i})",
                    'image_path' => $baseItem['image_path'],
                    'category' => $category,
                    'slug' => Str::slug("{$baseItem['title']}-{$i}"),
                    'is_featured' => $i === 1, // mark the first as featured
                ]);
            }
        }
    }
}
