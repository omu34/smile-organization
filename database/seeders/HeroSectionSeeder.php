<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'title' => 'Building brighter futures through strong partnerships.',
            'subtitle' => '"SFN collaborates with governments, civil society, businesses, and other key stakeholders to create lasting change."',
            'description' => '"SFN fosters a vibrant and impactful community of engaged members driving positive change."',
            'founder_quote' => '- CarolJoseph\'s Emoyo, Smile for Neuro-Diversity Founder',
            'founder_name' => 'CarolJoseph Emoyo',
            'highlight_text' => 'Make others Smile',
            'highlight_link' => 'https://smile-for-neurodiversity.netlify.app/',
            'video_path' => 'videos/affeceted-help.mp4',
            'background_opacity' => '0.7',
        ]);
    }
}

