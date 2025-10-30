<?php

namespace Database\Seeders;


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
            'email' => 'emoyocarol@gmail.com', // 🎯 This MUST match the email in the User model check
            'name'  => 'Smile',
            'phone' => '+254 715-830-347',
            'password' => Hash::make('password'), // ⚠️ replace with env('ADMIN_PASSWORD') in production
        ]);

        $this->call([
            // AdminUserSeeder::class,
            NavigationSeeder::class,
            SliderSeeder::class,
            ResourceItemSeeder::class,
            GallerySeeder::class,
            PartnerSeeder::class,
            DirectiveSeeder::class,
            ResourceItemSeeder::class,
            ActivitySeeder::class,
            BeneficiarySeeder::class,
            PartnerSeeder::class,
            FooterSeeder::class,
            ArticleSeeder::class,
            FeaturedArticleSeeder::class,
            VisitUsSeeder::class,
            ContactInfoSeeder::class,
            WhyUsItemSeeder::class,
            NavigationLogoHeaderSeeder::class,
        ]);
    }
}
