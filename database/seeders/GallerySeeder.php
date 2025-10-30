<?php

// database/seeders/GallerySeeder.php
// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Storage;
// use App\Models\Gallery;

// class GallerySeeder extends Seeder
// {
//     public function run(): void
//     {
//         Storage::makeDirectory('public/gallery');

//         // Example static images (place your own test images in storage/app/public/gallery)
//         Gallery::truncate();
//         Gallery::insert([
//             [
//                 'title' => 'Community Event',
//                 'category' => 'Events',
//                 'image' => 'gallery/event1.jpg',
//                 'description' => 'Our community outreach program in full action.'
//             ],
//             [
//                 'title' => 'Therapy Session',
//                 'category' => 'Therapies',
//                 'image' => 'gallery/therapy.jpg',
//                 'description' => 'A warm therapy moment with caregivers and kids.'
//             ],
//             [
//                 'title' => 'Play Time',
//                 'category' => 'Recreation',
//                 'image' => 'gallery/play.jpg',
//                 'description' => 'Smiles and laughter during recreational activities.'
//             ],
//         ]);
//     }
// }


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // <-- 1. Import Storage

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

        // --- PRODUCTION-READY IMAGE FIX ---
        // 2. Ensure the directory exists
        Storage::disk('public')->makeDirectory('images');

        // 3. Define a small, blank image (base64 encoded 1x1 GIF)
        $dummyImageContent = base64_decode('R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');

        foreach ($categories as $category => $baseItem) {

            // 4. Create the dummy file on disk if it doesn't exist
            if (!Storage::disk('public')->exists($baseItem['image_path'])) {
                Storage::disk('public')->put($baseItem['image_path'], $dummyImageContent);
            }

            for ($i = 1; $i <= 3; $i++) {
                $slug = Str::slug("{$baseItem['title']}-{$i}");

                // 5. Use updateOrCreate to prevent duplicate slug errors
                Gallery::updateOrCreate(
                    ['slug' => $slug], // Attributes to find
                    [                 // Attributes to create or update
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
