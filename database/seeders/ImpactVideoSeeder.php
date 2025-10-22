<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use App\Models\ImpactVideo;

class ImpactVideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Community Impact Video',
                'published_at' => '2023-12-22',
                'video_path' => 'videos/spreading-smile.mp4',
                'description' => 'Discover how SFN is transforming lives across communities. Witness firsthand the positive impact of our programs.',
                'order' => 1,
            ],
            [
                'title' => 'Supporting Families',
                'published_at' => '2023-03-15',
                'video_path' => 'videos/tris.mp4',
                'description' => 'Highlighting our commitment to supporting families affected by disability.',
                'order' => 2,
            ],
            [
                'title' => 'Celebrating Success: Vulnerable Families',
                'published_at' => '2023-01-05',
                'video_path' => 'videos/affeceted-help.mp4',
                'description' => 'Honoring the resilience and strength of vulnerable families we serve.',
                'order' => 3,
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
