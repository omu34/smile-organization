<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        $article = Article::create([
            'title' => 'About Our Organization',
            'body' => 'We are a Kenyan organization registered in 2020, dedicated to supporting persons with disabilities through empowerment, innovation, and inclusion. Our mission is to bridge opportunities and enhance dignity through practical programs and partnerships.',
            'is_published' => true,
        ]);

        $article->media()->create([
            'type' => 'image',
            'file_path' => 'imagess/hero.jpg',
            'is_primary' => true,
        ]);

        $article->media()->createMany([
            [
                'type' => 'youtube',
                'youtube_id' => 'dQw4w9WgXcQ',
            ],
            [
                'type' => 'video_local',
                'file_path' => 'imagess/home.mp4',
            ],
        ]);
    }
}
