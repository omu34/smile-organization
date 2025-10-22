<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::updateOrCreate(
            ['title' => 'About Smile for Neurodiversity'],
            [
                'description' => 'We are a community-driven initiative supporting neurodivergent individuals and families through awareness, inclusion, and empowerment programs.',
                'image_path'  => 'about/hero-smile.jpg',
            ]
        );
    }
}
