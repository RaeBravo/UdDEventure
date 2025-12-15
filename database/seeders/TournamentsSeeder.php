<?php

namespace Database\Seeders;

use App\Models\Tournament;
use App\Models\Event;
use Illuminate\Database\Seeder;

class TournamentsSeeder extends Seeder
{
    public function run(): void
    {
        $tournaments = [
            [
                'event_id' => 1, // Basketball Tournament
                'name' => 'Basketball Tournament 2025 - Championship',
                'bracket_type' => 'single',
                'total_rounds' => 3,
                'winners_rounds' => 3,
                'losers_rounds' => 0,
                'winner_id' => 1,
                'status' => 'active',
            ],
            [
                'event_id' => 2, // Chess Championship
                'name' => 'Chess Championship 2025 - Swiss Tournament',
                'bracket_type' => 'round-robin',
                'total_rounds' => 5,
                'winners_rounds' => 5,
                'losers_rounds' => 0,
                'winner_id' => 2,
                'status' => 'active',
            ],
            [
                'event_id' => 3, // Programming Hackathon
                'name' => 'Hackathon 2025 - Coding Competition',
                'bracket_type' => 'single',
                'total_rounds' => 4,
                'winners_rounds' => 4,
                'losers_rounds' => 0,
                'winner_id' => 3,
                'status' => 'draft',
            ],
            [
                'event_id' => 4, // Music Festival
                'name' => 'Music Festival 2025 - Battle of the Bands',
                'bracket_type' => 'single',
                'total_rounds' => 3,
                'winners_rounds' => 3,
                'losers_rounds' => 0,
                'winner_id' => 4,
                'status' => 'draft',
            ],
        ];

        foreach ($tournaments as $tournament) {
            Tournament::firstOrCreate($tournament);
        }

        $this->command->info('Tournaments seeded successfully!');
    }
}
