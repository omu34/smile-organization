<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Tri-Cycles Distribution',
                'description' => 'Empowering children with special needs with tri-cycles.',
                'image_path' => 'images/raniss.jpg',
                'category' => 'Empowerment',
                'is_featured' => true,
            ],
            [
                'title' => 'Inclusive Art Workshop',
                'description' => 'Promoting inclusivity through creative art sessions.',
                'image_path' => 'images/aboyseducation.jpg',
                'category' => 'Art & Education',
            ],
            [
                'title' => 'Narok County Outreach',
                'description' => 'Community outreach for awareness and inclusion.',
                'image_path' => 'images/narok.jpg',
                'category' => 'Community',
            ],
        ];

        foreach ($galleries as $item) {
            Gallery::create($item);
        }
    }
}
