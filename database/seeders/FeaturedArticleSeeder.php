<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedArticle;
use Illuminate\Support\Str;

class FeaturedArticleSeeder extends Seeder
{
    public function run(): void
    {
        FeaturedArticle::create([
            'title' => 'Understanding Neurodiversity: Beyond the Labels',
            'slug' => Str::slug('Understanding Neurodiversity: Beyond the Labels'),
            'excerpt' => 'Exploring the concept of neurodiversity and the strengths it brings.',
            'media_type' => 'image',
            'media_url' => 'imagess/diaperss.jpg',
            'is_published' => true,
        ]);

        FeaturedArticle::create([
            'title' => 'Empowering Neurodivergent Individuals in the Workplace',
            'slug' => Str::slug('Empowering Neurodivergent Individuals in the Workplace'),
            'excerpt' => 'Creating inclusive workplaces for neurodivergent individuals.',
            'media_type' => 'youtube',
            'media_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'is_published' => true,
        ]);

        FeaturedArticle::create([
            'title' => 'Building a Collaborative Community for Neurodiversity',
            'slug' => Str::slug('Building a Collaborative Community for Neurodiversity'),
            'excerpt' => 'The importance of collaboration in supporting neurodivergent individuals.',
            'media_type' => 'video',
            'media_url' => 'imagesss/resource2.mp4',
            'is_published' => true,
        ]);
    }
}
