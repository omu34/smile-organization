<?php

// database/seeders/FooterSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FooterInfo;
use App\Models\FooterCta;
use App\Models\SocialLink;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        FooterInfo::create([
            'company_name' => 'Smile For NeuroDiversity',
            'title' => 'imagess/smile-white-logo.jpg',
            'description' => 'We are dedicated to providing quality products and services that meet your needs.',
            'address' => '1234 Elm Street, Nairobi, Kenya',
            'phone' => '+254 715 830 347',
            'email' => 'smile4neurod@gmail.com',
        ]);

        FooterCta::create([
            'title' => 'Stay Connected',
            'subtitle' => 'Join our newsletter to receive updates and promotions.',
            'button_text' => 'Subscribe Now',
            'button_link' => '#subscribe',
        ]);

        SocialLink::insert([
            [
                'platform_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/fb.png',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'platform_name' => 'Instagram',
                'url' => 'https://instagram.com',
                'image_path' => 'imagess/ai1.jpg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'platform_name' => 'Twitter',
                'url' => 'https://twitter.com',
                'image_path' => 'imagess/x-logo.png',
                'is_active' => true,
                'order' => 3,
            ],
             [
                'platform_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/fb.png',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'platform_name' => 'Instagram',
                'url' => 'https://instagram.com',
                'image_path' => 'imagess/ai1.jpg',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'platform_name' => 'Twitter',
                'url' => 'https://twitter.com',
                'image_path' => 'imagess/x-logo.png',
                'is_active' => true,
                'order' => 6,
            ],
        ]);
    }
}

