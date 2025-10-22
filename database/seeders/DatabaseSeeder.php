<?php

namespace Database\Seeders;

use App\Models\ImpactVideo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Smile',
            'email' => 'smile@gmail.com',
            'phone' => '+254 724-555-020',
            'password' => Hash::make('smile123'), // ⚠️ replace with env('ADMIN_PASSWORD') in production
        ]);

        $this->call([
            AdminUserSeeder::class,
            NavigationSeeder::class,
            ImpactVideoSeeder::class,
            ResourceItemSeeder::class,
            GallerySeeder::class,
            PartnerSeeder::class,
            SocialLinkSeeder::class,
            // ArticleSeeder::class,
            AboutSectionSeeder::class,
            DirectiveSeeder::class,
            ResourceItemSeeder::class,
            ActivitySeeder::class,
            BeneficiarySeeder::class,

            PartnerSeeder::class,
            HeroSectionSeeder::class,
            // SocialLinkSeeder::class,
            WhyUsFeatureSeeder::class,
            // SiteContactSeeder::class
        ]);
    }
}
