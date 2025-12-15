<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Seeder;

class WritersSeeder extends Seeder
{
    public function run(): void
    {
        $writers = [
            [
                'user_id' => 1, // Admin user
                'status' => 'active',
                'bio' => 'Experienced content creator and event coordinator with expertise in sports management.',
                'specialization' => 'Sports, Events, Management',
            ],
            [
                'user_id' => 2, // Faculty user
                'status' => 'active',
                'bio' => 'Academic writer specializing in technology and business research publications.',
                'specialization' => 'Technology, Business, Research',
            ],
        ];

        foreach ($writers as $writer) {
            Faculty::updateOrCreate(
                ['user_id' => $writer['user_id']],
                $writer
            );
        }

        $this->command->info('Writers seeded successfully!');
    }
}
