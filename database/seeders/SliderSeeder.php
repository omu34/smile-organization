<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure storage path exists
        Storage::makeDirectory('public/slides');

        /**
         * 🏠 Home Page Slider
         */
        $homeSlider = Slider::updateOrCreate(
            ['slug' => 'home-page-slider'],
            [
                'name' => 'Home Page Slider',
                'is_active' => true,
            ]
        );

        $homeSlider->slides()->delete(); // Reset slides before reseeding
        $homeSlider->slides()->createMany([
            [
                'title' => 'Welcome to Our Organization',
                'description' => 'Making impact through innovation and service.',
                'image_url' => 'imagess/akakamega-county.jpg',
                'button_text' => 'Learn More',
                'button_link' => '/about',
                'position' => 1,
            ],
            [
                'title' => 'Join Our Mission',
                'description' => 'Together we build a better future.',
                'image_url' => 'imagess/asubcounty.jpg',
                'button_text' => 'Join Us',
                'button_link' => '/contact',
                'position' => 2,
            ],
            [
                'title' => 'Empowering Communities',
                'description' => 'Driven by purpose, guided by compassion.',
                'image_url' => 'imagess/family.webp',
                'button_text' => 'Get Involved',
                'button_link' => '/programs',
                'position' => 3,
            ],
        ]);

        /**
         * ℹ️ About Page Slider
         */
        $aboutSlider = Slider::updateOrCreate(
            ['slug' => 'about-page-slider'],
            [
                'name' => 'About Page Slider',
                'is_active' => true,
            ]
        );

        $aboutSlider->slides()->delete(); // Reset slides before reseeding
        $aboutSlider->slides()->createMany([
            [
                'title' => 'Who We Are',
                'description' => 'A team of passionate individuals dedicated to making an impact.',
                'image_url' => 'imagess/aelder.jpg',
                'button_text' => 'Meet the Team',
                'button_link' => '/team',
                'position' => 1,
            ],
            [
                'title' => 'Our Story',
                'description' => 'From humble beginnings to a movement that transforms lives.',
                'image_url' => 'imagess/afunction.jpg',
                'button_text' => 'Read Our Story',
                'button_link' => '/about/story',
                'position' => 2,
            ],
            [
                'title' => 'Our Values',
                'description' => 'Integrity, service, and innovation at the heart of everything we do.',
                'image_url' => 'imagess/agirleducation.jpg',
                'button_text' => 'Discover More',
                'button_link' => '/values',
                'position' => 3,
            ],
        ]);
    }
}
