<?php

namespace Database\Seeders;

use App\Models\RegisteredPlayer;
use App\Models\EventRegistration;
use App\Models\Bracket;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentMatch;
use App\Models\Complaint;
use App\Models\Item;
use App\Models\BorrowRequest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample registered players directly linked to events
        $events = \App\Models\Event::all();
        
        foreach ($events as $event) {
            // Create registered players for this event
            $players = [
                ['name' => 'Alex Johnson', 'student_id' => 'STU001', 'department' => 'Computer Science', 'age' => 20, 'email' => 'alex.j@student.edu'],
                ['name' => 'Maria Santos', 'student_id' => 'STU002', 'department' => 'Engineering', 'age' => 19, 'email' => 'maria.s@student.edu'],
                ['name' => 'James Wilson', 'student_id' => 'STU003', 'department' => 'Business', 'age' => 21, 'email' => 'james.w@student.edu'],
            ];
            
            foreach ($players as $player) {
                RegisteredPlayer::create([
                    'name' => $player['name'],
                    'student_id' => $player['student_id'],
                    'department' => $player['department'],
                    'age' => $player['age'],
                    'email' => $player['email'],
                    'event_id' => $event->id,
                    'status' => 'approved',
                    'gdrive_link' => 'https://drive.google.com/sample/' . Str::random(10),
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now()->subDays(rand(1, 30)),
                ]);
            }
        }

        // Create sample brackets for events that allow bracketing
        $bracketableEvents = $events->where('allow_bracketing', true);
        
        foreach ($bracketableEvents as $event) {
            Bracket::create([
                'event_id' => $event->id,
                'matches' => json_encode([
                    'rounds' => $this->generateBracketRounds($event->teams, $event->bracket_type),
                    'current_round' => 1,
                    'matches' => []
                ]),
                'team_players' => $event->teams,
                'champion' => 'Team 1', // Default champion for seeding
            ]);
        }

        // Create sample teams
        $registeredPlayers = RegisteredPlayer::all();
        foreach ($events as $event) {
            if ($event->registration_type === 'team') {
                for ($i = 1; $i <= min(4, $event->teams); $i++) {
                    $teamMembers = $registeredPlayers->random(min($event->team_size, $registeredPlayers->count()))->pluck('name')->toArray();
                    Team::create([
                        'event_id' => $event->id,
                        'name' => "Team {$i} - " . Str::random(5),
                        'members' => json_encode($teamMembers),
                        'seed' => $i,
                    ]);
                }
            }
        }

        // Create sample tournaments
        foreach ($events->take(3) as $event) {
            $tournament = Tournament::create([
                'event_id' => $event->id,
                'name' => $event->title . ' Tournament',
                'bracket_type' => 'single',
                'total_rounds' => $this->generateBracketRounds($event->teams, $event->bracket_type),
                'status' => 'active',
            ]);

            // Create sample matches for the tournament
            $this->createSampleMatches($tournament);
        }

        // Create sample complaints
        $complaints = [
            ['name' => 'John Doe', 'block' => 'Block 1', 'department' => 'Computer Science', 'complaint_letter' => 'The gymnasium was too crowded during the event.'],
            ['name' => 'Jane Smith', 'block' => 'Block 2', 'department' => 'Engineering', 'complaint_letter' => 'Event timing conflicts with class schedule.'],
            ['name' => 'Mike Johnson', 'block' => 'Block 3', 'department' => 'Business', 'complaint_letter' => 'Insufficient equipment provided for the tournament.'],
        ];

        foreach ($complaints as $index => $complaint) {
            Complaint::create([
                'name' => $complaint['name'],
                'block' => $complaint['block'],
                'department' => $complaint['department'],
                'complaint_letter' => $complaint['complaint_letter'],
                'event_id' => $events->random()->id,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 5)),
            ]);
        }

        // Create sample items for borrowing
        $items = [
            ['name' => 'Basketball', 'quantity' => 10],
            ['name' => 'Chess Set', 'quantity' => 5],
            ['name' => 'Laptop', 'quantity' => 15],
            ['name' => 'Projector', 'quantity' => 3],
            ['name' => 'Microphone', 'quantity' => 8],
        ];

        foreach ($items as $item) {
            Item::create([
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 5)),
            ]);
        }

        $this->command->info('Sample data created successfully!');
    }

    private function generateBracketRounds($teams, $type)
    {
        if ($type === 'single' || $type === 'single_elimination') {
            return ceil(log($teams, 2));
        } elseif ($type === 'double' || $type === 'double_elimination') {
            return ceil(log($teams, 2)) * 2;
        } elseif ($type === 'round-robin') {
            return $teams - 1;
        }
        return 3;
    }

    private function createSampleMatches($tournament)
    {
        $teams = Team::where('event_id', $tournament->event_id)->get();
        $matches = [];
        $matchIdCounter = 1;
        
        if ($teams->count() >= 2) {
            // Create matches with all fields populated
            for ($i = 0; $i < min(3, $teams->count() - 1); $i++) {
                $matches[] = [
                    'match_id' => $matchIdCounter++,
                    'tournament_id' => $tournament->id,
                    'team1_id' => $teams[$i]->id,
                    'team2_id' => $teams[$i + 1]->id,
                    'round' => 1,
                    'match_number' => $i + 1,
                    'bracket' => 'winner',
                    'losers_round' => 1,
                    'round_name' => 'Round 1',
                    'position' => $i + 1,
                    'team1_seed' => $i + 1,
                    'team2_seed' => $i + 2,
                    'winner_id' => $teams[$i]->id, // Default winner for seeding
                    'start_time' => now()->addDays($i + 1),
                    'status' => 'pending',
                    'team1_score' => 0,
                    'team2_score' => 0,
                ];
            }
        }

        // Insert matches first without foreign key relationships
        $createdMatches = [];
        foreach ($matches as $match) {
            // Set foreign key fields to null initially
            $match['next_match_id'] = null;
            $match['loser_to'] = null;
            $match['previous_match_loser_1'] = null;
            $match['previous_match_loser_2'] = null;
            
            $createdMatch = TournamentMatch::create($match);
            $createdMatches[] = $createdMatch;
        }

        // Update foreign key relationships using actual database IDs
        if (count($createdMatches) >= 2) {
            foreach ($createdMatches as $index => $match) {
                $match->update([
                    'next_match_id' => $createdMatches[min($index + 1, count($createdMatches) - 1)]->id,
                    'loser_to' => $match->id, // Points to itself
                    'previous_match_loser_1' => $match->id, // Points to itself
                    'previous_match_loser_2' => $match->id, // Points to itself
                ]);
            }
        } elseif (count($createdMatches) === 1) {
            // If only one match, point to itself
            $createdMatches[0]->update([
                'next_match_id' => $createdMatches[0]->id,
                'loser_to' => $createdMatches[0]->id,
                'previous_match_loser_1' => $createdMatches[0]->id,
                'previous_match_loser_2' => $createdMatches[0]->id,
            ]);
        }
    }
}
