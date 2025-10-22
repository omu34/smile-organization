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
            'email' => 'smile@gmail.com',
            'name'  => 'Smile',
            'phone' => '+254 724-555-020',
        ];

        User::updateOrCreate(
            ['email' => $admin['email']], // lookup by email
            [
                'name'              => $admin['name'],
                'phone'             => $admin['phone'],
                'password'          => Hash::make('smile123'), // ⚠️ replace with env('ADMIN_PASSWORD') in production
                'avatar'            => null,
                'email_verified_at' => now(),
            ]
        );
    }
}
