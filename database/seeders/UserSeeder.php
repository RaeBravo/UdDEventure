<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // Secure password
                'remember_token' => Str::random(10),
                'role' => User::ROLE_ADMIN,
            ]
        );

        // Create a test faculty user
        $faculty = User::firstOrCreate(
            ['email' => 'faculty@example.com'],
            [
                'name' => 'Test Faculty',
                'email_verified_at' => now(),
                'password' => Hash::make('faculty123'),
                'remember_token' => Str::random(10),
                'role' => User::ROLE_FACULTY,
            ]
        );

        // Create faculty profile for the test faculty
        if ($faculty->wasRecentlyCreated) {
            Faculty::create([
                'user_id' => $faculty->id,
                'status' => Faculty::STATUS_ACTIVE,
                'bio' => 'Professional content creator with 5+ years of experience',
                'specialization' => 'Technology, Business',
            ]);
        }

        $this->command->info('Users created successfully!');
        $this->command->info('Admin: admin@gmail.com / admin123');
        $this->command->info('Faculty: faculty@example.com / faculty123');
        $this->command->warn('Please change the default passwords after first login!');
    }
}