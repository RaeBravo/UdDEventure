<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WritersSeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            EventRegistrationSeeder::class,
            ItemsSeeder::class,
            BorrowRequestsSeeder::class,
            AthletesSeeder::class,
            PlayersSeeder::class,
            RequirementsSeeder::class,
            TeamsSeeder::class,
            TournamentsSeeder::class,
            SampleDataSeeder::class,
            PlayerSeeder::class,

        ]);
    }
}


