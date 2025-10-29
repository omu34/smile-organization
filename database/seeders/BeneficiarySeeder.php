<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beneficiary;
use Illuminate\Support\Str;

class BeneficiarySeeder extends Seeder
{
    public function run(): void
    {
        $beneficiaries = [
            [
                'title' => 'Mothers in Need',
                'description' => "SFN's diaper support empowers vulnerable women to provide essential care for their children, fostering healthier, happier families.",
                'image_path' => 'imagess/vulnerable-happy.jpg',
                'published_at' => now()->subMonths(2),
            ],
            [
                'title' => 'Unlocking Potential',
                'description' => "SFN provides tailored support for individuals with autism, fostering independence, inclusion, and a higher quality of life through specialized programs and services.",
                'image_path' => 'imagess/smiless.jpg',
                'published_at' => now()->subMonths(3),
            ],
            [
                'title' => 'Family, First and Foremost',
                'description' => "SFN supports families by providing resources and services that enhance the well-being of individuals with disabilities and their loved ones.",
                'image_path' => 'imagess/save.jpg',
                'published_at' => now()->subMonths(4),
            ],
        ];

        foreach ($beneficiaries as $b) {
            Beneficiary::updateOrCreate(
                ['slug' => Str::slug($b['title'])],
                $b
            );
        }
    }
}
