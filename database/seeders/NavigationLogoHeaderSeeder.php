<?php


namespace Database\Seeders;

use App\Models\NavigationLogoHeader;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class NavigationLogoHeaderSeeder extends Seeder
{
    public function run(): void
    {
        // $shops = Shop::all();

        // foreach ($shops as $shop) {
            NavigationLogoHeader::updateOrCreate(
                // ['shop_id' => $shop->id],
                [
                    'logo_path' => 'logos/smile-white-logo.jpg',
                    'link' => url('/'),
                ]
            );
        // }

        $this->command->info('Navigation logos seeded .');
    }
}


