<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::updateOrCreate(
            ['title' => 'Main Office'],
            [
                'phone' => '+254 724 555 020',
                'email' => 'info@smileforneurodiversity.org',
                'address' => 'Kawangware PAG, Nairobi, Kenya',
                'google_map_iframe' => '<iframe src="https://maps.google.com/..."></iframe>',
            ]
        );
    }
}
