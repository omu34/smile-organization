<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Storage::makeDirectory('public/articles');

        $a = Article::create([
            'title' => 'Understanding Neurodiversity: Beyond the Labels',
            'excerpt' => 'Exploring strengths and perspectives of neurodivergent individuals.',
            'body' => 'Longer article content... (put your rich html or markdown here).',
            'is_featured' => true,
            'reading_time_minutes' => 6,
            'position' => 1,
        ]);

        $a->media()->createMany([
            [
                'type' => 'image',
                'file_path' => 'articles/diaperss.jpg',
                'is_primary' => true,
                'position' => 1,
            ],
        ]);

        $b = Article::create([
            'title' => 'Empowering Neurodivergent Individuals in the Workplace',
            'excerpt' => 'Practical tips for employers & supports for neurodivergent employees.',
            'body' => 'Longer article content...',
            'is_featured' => true,
            'reading_time_minutes' => 4,
            'position' => 2,
        ]);

        $b->media()->createMany([
            [
                'type' => 'video_local',
                'file_path' => 'articles/sample-video.mp4',
                'is_primary' => true,
                'position' => 1,
            ],
            [
                'type' => 'image',
                'file_path' => 'articles/smile16.jpg',
                'is_primary' => false,
                'position' => 2,
            ],
        ]);

        $c = Article::create([
            'title' => 'Building a Collaborative Community for Neurodiversity',
            'excerpt' => 'Partnerships between families, educators and organisations.',
            'body' => 'Longer article content...',
            'is_featured' => true,
            'reading_time_minutes' => 11,
            'position' => 3,
        ]);

        $c->media()->createMany([
            [
                'type' => 'youtube',
                'youtube_url' => 'https://youtu.be/VIDEO_ID_EXAMPLE',
                'is_primary' => true,
                'position' => 1,
            ],
            [
                'type' => 'image',
                'file_path' => 'articles/smile17.jpg',
                'position' => 2,
            ],
        ]);
    }
}
