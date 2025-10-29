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
            'company_name' => 'Your Company',
            'title' => 'images/smile-white-logo.jpg',
            'description' => 'We are dedicated to providing quality products and services that meet your needs.',
            'address' => '1234 Elm Street, Nairobi, Kenya',
            'phone' => '+254 700 123 456',
            'email' => 'info@yourcompany.com',
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
                'image_path' => 'social-icons/facebook.png',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'platform_name' => 'Instagram',
                'url' => 'https://instagram.com',
                'image_path' => 'social-icons/instagram.png',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'platform_name' => 'Twitter',
                'url' => 'https://twitter.com',
                'image_path' => 'social-icons/twitter.png',
                'is_active' => true,
                'order' => 3,
            ],
        ]);
    }
}

