<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\AreaOfPractice;
use App\Models\AreaTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class AreaOfPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  

        AreaTitle::create([
            'title' => 'Smile For NeuroDiversity',
            'description' => 'Our proven expertise allows us to provide effective and efficient
                    legal solutions to your specific needs.',           
        ]);


        AreaOfPractice::insert([
            [
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/fb.png',
                'is_active' => true,
                'order' => 1,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/ai1.jpg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/x-logo.png',
                'is_active' => true,
                'order' => 3,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/fb.png',
                'is_active' => true,
                'order' => 4,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/ai1.jpg',
                'is_active' => true,
                'order' => 5,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/x-logo.png',
                'is_active' => true,
                'order' => 6,
            ],

            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/ai1.jpg',
                'is_active' => true,
                'order' => 7,
            ],
            [
                
                'subtitle' => 'Facebook',
                'button_name' => 'Facebook',
                'url' => 'https://facebook.com',
                'image_path' => 'imagess/x-logo.png',
                'is_active' => true,
                'order' => 8,
            ],
        ]);
    }
}
