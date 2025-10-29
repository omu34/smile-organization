<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'email' => 'emoyocarol@gmail.com',
            'name'  => 'Smile',
            'phone' => '+254 715-830-347',
        ];

        User::updateOrCreate(
            ['email' => $admin['email']], // lookup by email
            [
                'name'              => $admin['name'],
                'phone'             => $admin['phone'],
                'password'          => Hash::make('password'), // ⚠️ replace with env('ADMIN_PASSWORD') in production
                'avatar'            => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
