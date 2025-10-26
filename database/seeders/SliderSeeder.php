<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the storage directory if missing
        Storage::makeDirectory('public/slides');

        // Create the main slider
        $slider = Slider::create([
            'name' => 'Home Page Slider',
            'page_slug' => 'pages.home', // 👈 Must match your Livewire component slug
            'is_active' => true,
        ]);

        // Attach slides
        $slider->slides()->createMany([
            [
                'title' => 'Welcome to Our Organization',
                'description' => 'Making impact through innovation and service.',
                'image_url' => 'slides/welcome.jpg',
                'button_text' => 'Learn More',
                'button_link' => '/about',
                'position' => 1,
            ],
            [
                'title' => 'Join Our Mission',
                'description' => 'Together we build a better future.',
                'image_url' => 'slides/mission.jpg',
                'button_text' => 'Join Us',
                'button_link' => '/contact',
                'position' => 2,
            ],
        ]);
    }
}
