<?php

namespace Database\Seeders;

use App\Models\Directive;
use Illuminate\Database\Seeder;

class DirectiveSeeder extends Seeder
{
    public function run(): void
    {
        Directive::insert([
            [
                'title' => 'Mission',
                'description' => 'Our mission is to advocate for the needs and rights of children with neurological conditions and provide psychosocial support for parents, ensuring their well-being as they care for these special children.',
                'icon' => 'heroicon-o-home-modern',
                'color' => '#000000',
                'order' => 1,
            ],
            [
                'title' => 'Objectives',
                'description' => 'Our objectives are to mobilize resources to develop a school for neurodiverse children, advocate for their rights and needs, provide psychosocial support for caregivers, promote recreational activities, ensure access to affordable therapies and assistive devices, foster mutual support among members, and encourage participation in group initiatives like diaper drives.',
                'icon' => 'heroicon-o-book-open',
                'color' => '#000000',
                'order' => 2,
            ],
            [
                'title' => 'Vision',
                'description' => 'To build a global community that increases the inclusion and celebration of neurodiversity.',
                'icon' => 'heroicon-o-eye',
                'color' => '#000000',
                'order' => 3,
            ],
        ]);
    }
}
