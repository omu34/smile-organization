<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;
use App\Models\FooterInfo;
use App\Models\FooterCta;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This seeder is idempotent and can be run multiple times safely.
     */
    public function run(): void
    {
        // === Seed Social Links ===
        $socials = [
            ['platform' => 'Facebook', 'url' => 'https://facebook.com/groups/409075511296739', 'icon' => 'facebook'],
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/in/smile-kenya', 'icon' => 'linkedin'],
            ['platform' => 'WhatsApp', 'url' => 'https://wa.me/254715830347', 'icon' => 'whatsapp'],
            ['platform' => 'X (Twitter)', 'url' => 'https://twitter.com/@smile_official', 'icon' => 'twitter'],
        ];

        foreach ($socials as $link) {
            SocialLink::updateOrCreate(
                ['platform' => $link['platform']], // Find by platform name
                [
                    'url' => $link['url'],
                    'icon' => $link['icon'],
                    'is_active' => true
                ]
            );
        }

        // === Seed Footer Info (Singleton) ===
        // This ensures only one row for footer info ever exists.
        FooterInfo::updateOrCreate(
            ['id' => 1], // You can use any unique, static identifier
            [
                'office_location' => 'Kawangware PAG',
                'office_url' => 'https://www.google.com/maps/place/Kawangware+P.A.G+Church/@-1.284856,36.749714,16z/data=!4m6!3m5!1s0x182f19a0082f4e3b:0xb63309348821014a!8m2!3d-1.2848559!4d36.7497141!16s%2Fg%2F11b6b_31x1?hl=en&entry=ttu',
                'email' => 'carolemoyo@gmail.com',
                'phone' => '+254715830347',
                'copyright_text' => '© ' . date('Y') . ' Smile™. All Rights Reserved.',
            ]
        );

        // === Seed Footer CTAs ===
        $ctas = [
            ['label' => 'SignUp', 'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdO7N7K8xY243jG-L_wPz6f7qR9aB8c0K1eX5sT7uJ9iO0pBg/viewform', 'style_class' => 'bg-pink-700 hover:bg-pink-800'],
            ['label' => 'Donate', 'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSfi8G-p_Qh7mR8sL9jT2oW4bN0c_XyZ1eF3uT5oI6rP7sE-zA/viewform', 'style_class' => 'bg-pink-600 hover:bg-pink-800'],
        ];

        foreach ($ctas as $cta) {
            FooterCta::updateOrCreate(
                ['label' => $cta['label']], // Find by label
                [
                    'url' => $cta['url'],
                    'style_class' => $cta['style_class'],
                    'is_active' => true
                ]
            );
        }
    }
}
