<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Smile with us',
                'image' => 'imagess/smile-logo.jpg',
                'description' => 'Make sure when you smile make others smile too.',
                'order' => 1,
            ],
            [
                'title' => 'From this',
                'image' => 'imagess/beneficiary.jpg',
                'description' => 'Tight life in villages but Smile for Neuro-Diversity makes sure it reaches you.',
                'order' => 2,
            ],
            [
                'title' => 'To this',
                'image' => 'imagess/abenefeciary.jpg',
                'description' => 'Was really a tough journey and this is how Smile transformed me.',
                'order' => 3,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::updateOrCreate($activity);
        }
    }
}
