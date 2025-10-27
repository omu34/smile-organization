<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WhyUsItem;

class WhyUsItemSeeder extends Seeder
{
    public function run(): void
    {
        WhyUsItem::truncate();

        $items = [
            [
                'title' => 'Focus on Empowerment and Inclusion',
                'description' => 'Smile is led by and includes individuals with lived experience of neurodiversity...',
                'image_url' => 'https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp',
                'order' => 1,
            ],
            [
                'title' => 'Promoting Strengths and Independence',
                'description' => 'We prioritize empowering neurodivergent individuals to thrive...',
                'image_url' => 'https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp',
                'order' => 2,
            ],
            [
                'title' => 'Collaborative and Holistic Approach',
                'description' => 'We believe in working together with families, educators and professionals...',
                'image_url' => 'https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp',
                'order' => 3,
            ],
            [
                'title' => 'Evidence-Based and Continuous Improvement',
                'description' => 'We are committed to using evidence-based practices and continuous learning...',
                'image_url' => 'https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp',
                'order' => 4,
            ],
        ];

        WhyUsItem::insert($items);
    }
}
