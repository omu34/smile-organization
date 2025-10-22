<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        SocialLink::insert([
            [
                'platform_name' => 'Facebook',
                'icon' => 'facebook',
                'url' => 'https://www.facebook.com/groups/409075511296739',
                'color' => '#1877F2',
                'order' => 1,
            ],
            [
                'platform_name' => 'LinkedIn',
                'icon' => 'linkedin',
                'url' => 'https://linkedin.com/in/smile-kenya/',
                'color' => '#0077B5',
                'order' => 2,
            ],
            [
                'platform_name' => 'Instagram',
                'icon' => 'instagram',
                'url' => 'https://instagram.com/smilekenya',
                'color' => '#E4405F',
                'order' => 3,
            ],
            [
                'platform_name' => 'YouTube',
                'icon' => 'youtube',
                'url' => 'https://www.youtube.com/@smilekenya',
                'color' => '#FF0000',
                'order' => 4,
            ],
            [
                'platform_name' => 'WhatsApp',
                'icon' => 'whatsapp',
                'url' => 'https://wa.me/254700000000',
                'color' => '#25D366',
                'order' => 5,
            ],
            [
                'platform_name' => 'TikTok',
                'icon' => 'tiktok',
                'url' => 'https://tiktok.com/@smilekenya',
                'color' => '#010101',
                'order' => 6,
            ],
        ]);
    }
}
