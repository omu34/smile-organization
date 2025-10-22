<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Rani Ramchandani Kenya',
                'logo' => 'partners/partner1.jpg',
                'testimonial' => 'SFN is an exceptional partner. Our long-standing collaboration has been incredibly fruitful.',
                'rating' => 5,
                'reviews_count' => 170,
                'website_url' => 'https://raniramchandanikenya.simdif.com/',
                'is_featured' => true,
            ],
            [
                'name' => 'National Council for Persons with Disabilities (NCPWD)',
                'logo' => 'partners/partner2.jpg',
                'testimonial' => 'Working with SFN was an absolute dream! Their team is exceptional. We wholeheartedly recommend them!',
                'rating' => 5,
                'reviews_count' => 170,
                'website_url' => 'https://ncpwd.go.ke/',
                'is_featured' => true,
            ],
            [
                'name' => 'Glit Interiors',
                'logo' => 'partners/partner4.jpg',
                'testimonial' => 'We absolutely love the work SFN is doing! Their dedication to the neurodiverse community is inspiring.',
                'rating' => 5,
                'reviews_count' => 170,
                'website_url' => 'https://glitinterior.com/services/',
                'is_featured' => true,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
