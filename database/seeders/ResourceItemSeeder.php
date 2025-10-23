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
                'description' => 'We provide curated materials to help parents and caregivers support children’s growth.',
                'extra_description' => 'Resources include e-books, guides, and videos.',
                'image_path' => 'resources/sample1.jpg',
                'video_path' => null, // <-- Add this
                'alignment' => 'left',
                'position' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Recreational Activities',
                'description' => 'Fun, inclusive events that foster development and connection.',
                'extra_description' => null,
                'image_path' => null, // <-- Add this
                'video_path' => 'resources/sample-video.mp4',
                'alignment' => 'right',
                'position' => 2,
                'is_published' => true,
            ],
        ]);
    }
}
