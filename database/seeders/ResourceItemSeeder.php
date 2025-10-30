<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResourceItem;

class ResourceItemSeeder extends Seeder
{
    public function run(): void
    {
        ResourceItem::truncate();

        ResourceItem::insert([
            [
                'title' => 'Educational Materials',
                'slug' => 'educational-materials',
                'description' => 'We provide curated materials to help parents and caregivers support children’s growth.',
                'extra_description' => 'Resources include e-books, guides, and videos.',
                'image_path' => 'imagess/resource.jpg',
                'video_path' => null, // <-- Add this
                'alignment' => 'left',
                'position' => 1,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Recreational Activities',
                'slug' => 'recreational-activities',
                'description' => 'Fun, inclusive events that foster development and connection.',
                'extra_description' => null,
                'image_path' => 'imagess/party.jpg', // <-- Add this
                'video_path' => 'imagess/resource2.mp4',
                'alignment' => 'right',
                'position' => 2,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Activities',
                'slug' => 'activities',
                'description' => 'Fun, inclusive events that foster development and connection.',
                'extra_description' => null,
                'image_path' => 'imagess/girls.jpg', // <-- Add this
                'video_path' => 'imagess/girls.jpg',
                'alignment' => 'left',
                'position' => 2,
                'is_published' => true,
                'published_at' => now(),
            ],
        ]);
    }
}
