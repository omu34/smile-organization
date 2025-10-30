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
            'email' => 'emoyocarol@gmail.com', // 🎯 This MUST match the email in the User model check
            'name'  => 'Smile',
            'phone' => '+254 715-830-347',
        ];

        User::updateOrCreate(
            ['email' => $admin['email']],
            [
                'name'              => $admin['name'],
                'phone'             => $admin['phone'],
                // Use a secure password (default is 'password' from the env)
                'password'          => Hash::make(env('ADMIN_PASSWORD', 'password')),
                'avatar'            => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
