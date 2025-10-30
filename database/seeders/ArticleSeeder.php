<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Storage::makeDirectory('public/aboutus');

        $article = Article::create([
            'title' => 'About Us',
            'body' => 'We are a Kenyan organization, registered in 2020, dedicated to supporting persons with disabilities and empowering caregivers through inclusive programs and sustainable community development.',
        ]);

        Media::create([
            'article_id' => $article->id,
            'type' => 'image',
            'file_path' => 'imagess/counties.jpg',
            'is_primary' => true,
        ]);
    }
}

