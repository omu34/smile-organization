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
                'subtitle' => 'Smile with us',

                'image' => 'imagess/smile-logo.jpg',
                'description' => 'Make sure when you smile make others smile too.',
                'extra_description' => 'Make sure when you smile make others smile too.',
                'order' => 1,
            ],
            [
                'title' => 'From this',
                'subtitle' => 'Smile with us',
                'image' => 'imagess/beneficiary.jpg',
                'description' => 'Tight life in villages but Smile for Neuro-Diversity makes sure it reaches you.',
                'extra_description' => 'Make sure when you smile make others smile too.',
                'order' => 2,
            ],
            [
                'title' => 'To this',
                'subtitle' => 'Smile with us',
                'image' => 'imagess/abenefeciary.jpg',
                'description' => 'Was really a tough journey and this is how Smile transformed me.',
                'extra_description' => 'Make sure when you smile make others smile too.',
                'order' => 3,
            ],
        ];

        //         foreach ($activities as $activity) {
        //     Activity::create($activity);
        // }


        foreach ($activities as $activity) {
            Activity::updateOrCreate(
                ['title' => $activity['title']], // unique key
                $activity
            );
        }
    }
}
