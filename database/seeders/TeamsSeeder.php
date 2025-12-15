<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Event;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            [
                'event_id' => 1, // Basketball Tournament
                'name' => 'Hawks',
                'members' => json_encode(['Michael Jordan Jr.', 'James Thompson', 'Chris Paul', 'Kevin Durant', 'LeBron James']),
                'seed' => 1,
            ],
            [
                'event_id' => 1,
                'name' => 'Eagles',
                'members' => json_encode(['Stephen Curry', 'Klay Thompson', 'Draymond Green', 'Andrew Wiggins', 'Jordan Poole']),
                'seed' => 2,
            ],
            [
                'event_id' => 1,
                'name' => 'Lakers',
                'members' => json_encode(['Anthony Davis', 'Russell Westbrook', 'Carmelo Anthony', 'Dwight Howard', 'Austin Reaves']),
                'seed' => 3,
            ],
            [
                'event_id' => 1,
                'name' => 'Celtics',
                'members' => json_encode(['Jayson Tatum', 'Jaylen Brown', 'Marcus Smart', 'Al Horford', 'Robert Williams']),
                'seed' => 4,
            ],
            [
                'event_id' => 2, // Chess Championship
                'name' => 'Masters',
                'members' => json_encode(['Sarah Williams', 'Magnus Carlsen', 'Fabiano Caruana', 'Hikaru Nakamura']),
                'seed' => 1,
            ],
            [
                'event_id' => 2,
                'name' => 'Scholars',
                'members' => json_encode(['Wesley So', 'Leinier Dominguez', 'Jeffery Xiong', 'Sam Sevian']),
                'seed' => 2,
            ],
            [
                'event_id' => 3, // Programming Hackathon
                'name' => 'Code Warriors',
                'members' => json_encode(['David Chen', 'Alice Johnson', 'Bob Smith', 'Carol White']),
                'seed' => 1,
            ],
            [
                'event_id' => 3,
                'name' => 'Tech Innovators',
                'members' => json_encode(['Frank Lee', 'Grace Kim', 'Henry Wilson', 'Ivy Taylor']),
                'seed' => 2,
            ],
            [
                'event_id' => 4, // Music Festival
                'name' => 'Rock Stars',
                'members' => json_encode(['John Doe', 'Jane Smith', 'Mike Johnson']),
                'seed' => 1,
            ],
            [
                'event_id' => 5, // Science Exhibition
                'name' => 'Lab Rats',
                'members' => json_encode(['Emily Rodriguez', 'Tom Brown', 'Lisa Davis']),
                'seed' => 1,
            ],
        ];

        foreach ($teams as $team) {
            Team::firstOrCreate($team);
        }

        $this->command->info('Teams seeded successfully!');
    }
}
