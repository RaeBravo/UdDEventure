<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // Ongoing Events
            [
                'title' => 'Basketball Tournament 2025',
                'description' => 'Annual basketball competition featuring teams from all departments. Join us for exciting matches and showcase your basketball skills.',
                'coordinator_name' => 'John Smith',
                'venue' => 'Main Gymnasium',
                'participants' => ['Students', 'Faculty', 'Staff'],
                'category' => 'other',
                'other_category' => 'Basketball',
                'event_type' => 'competition',
                'event_date' => now()->subDays(2), // Started 2 days ago (ongoing)
                'event_end_date' => now()->addDays(1), // Ends tomorrow
                'registration_end_date' => now()->subDays(7),
                'has_registration_end_date' => true,
                'registration_type' => 'team',
                'team_size' => 5,
                'required_players' => 5,
                'allow_bracketing' => true,
                'bracket_type' => 'single',
                'teams' => 8,
                'rulebook_path' => 'rules/basketball-2025.pdf',
                'image_path' => 'events/basketball-tournament-2025.jpg',
            ],
            [
                'title' => 'Chess Championship',
                'description' => 'Test your strategic thinking in our annual chess championship. Open to all skill levels.',
                'coordinator_name' => 'Maria Garcia',
                'venue' => 'Conference Room A',
                'participants' => ['Students', 'Faculty'],
                'category' => 'other',
                'other_category' => 'Chess Competition',
                'event_type' => 'competition',
                'event_date' => now()->subDays(1), // Started yesterday (ongoing)
                'event_end_date' => now()->addDays(2),
                'registration_end_date' => now()->subDays(5),
                'has_registration_end_date' => true,
                'registration_type' => 'single',
                'team_size' => 1,
                'required_players' => 1,
                'allow_bracketing' => true,
                'bracket_type' => 'round-robin',
                'teams' => 32,
                'rulebook_path' => 'rules/chess-2025.pdf',
                'image_path' => 'events/chess-championship-2025.jpg',
            ],
            
            // Recent Events (Just finished)
            [
                'title' => 'Programming Hackathon 2025',
                'description' => '24-hour coding competition to develop innovative solutions. Bring your laptops and creativity!',
                'coordinator_name' => 'David Chen',
                'venue' => 'Computer Lab 101',
                'participants' => ['Students'],
                'category' => 'other',
                'other_category' => 'Programming Competition',
                'event_type' => 'competition',
                'event_date' => now()->subDays(5), // 5 days ago (recent)
                'event_end_date' => now()->subDays(4), // 4 days ago
                'registration_end_date' => now()->subDays(10),
                'has_registration_end_date' => true,
                'registration_type' => 'team',
                'team_size' => 4,
                'required_players' => 2,
                'allow_bracketing' => false,
                'teams' => 16,
                'rulebook_path' => 'rules/hackathon-2025.pdf',
                'image_path' => 'events/programming-hackathon-2025.jpg',
            ],
            [
                'title' => 'Music Festival 2025',
                'description' => 'Celebrate musical talents with performances, competitions, and workshops. All genres welcome!',
                'coordinator_name' => 'Sarah Johnson',
                'venue' => 'Auditorium',
                'participants' => ['Students', 'Faculty', 'Staff', 'Public'],
                'category' => 'other',
                'other_category' => 'Music Competition',
                'event_type' => 'competition',
                'event_date' => now()->subDays(7), // 1 week ago (recent)
                'event_end_date' => now()->subDays(6), // 6 days ago
                'registration_end_date' => now()->subDays(12),
                'has_registration_end_date' => true,
                'registration_type' => 'single',
                'team_size' => 1,
                'required_players' => 1,
                'allow_bracketing' => true,
                'bracket_type' => 'single',
                'teams' => 20,
                'rulebook_path' => 'rules/music-festival-2025.pdf',
                'image_path' => 'events/music-festival-2025.jpg',
            ],
            
            // Upcoming Events
            [
                'title' => 'Science Exhibition 2025',
                'description' => 'Showcase your scientific projects and research. Open to all science departments.',
                'coordinator_name' => 'Dr. Robert Wilson',
                'venue' => 'Science Building Hall',
                'participants' => ['Students', 'Faculty'],
                'category' => 'other',
                'other_category' => 'Science Exhibition',
                'event_type' => 'competition',
                'event_date' => now()->addDays(10), // 10 days from now (upcoming)
                'event_end_date' => now()->addDays(11),
                'registration_end_date' => now()->addDays(7),
                'has_registration_end_date' => true,
                'registration_type' => 'team',
                'team_size' => 3,
                'required_players' => 1,
                'allow_bracketing' => false,
                'teams' => 25,
                'rulebook_path' => 'rules/science-exhibition-2025.pdf',
                'image_path' => 'events/science-exhibition-2025.jpg',
            ],
            [
                'title' => 'Art Workshop 2025',
                'description' => 'Learn various art techniques from professional artists. All skill levels welcome!',
                'coordinator_name' => 'Elena Rodriguez',
                'venue' => 'Art Studio',
                'participants' => ['Students', 'Faculty', 'Staff'],
                'category' => 'other',
                'other_category' => 'Art Workshop',
                'event_type' => 'tryouts',
                'event_date' => now()->addDays(15), // 15 days from now (upcoming)
                'event_end_date' => now()->addDays(15),
                'registration_end_date' => now()->addDays(12),
                'has_registration_end_date' => true,
                'registration_type' => 'single',
                'team_size' => 1,
                'required_players' => 1,
                'allow_bracketing' => false,
                'teams' => 30,
                'rulebook_path' => 'rules/art-workshop-2025.pdf',
                'image_path' => 'events/art-workshop-2025.jpg',
            ],
            [
                'title' => 'Debate Competition 2025',
                'description' => 'Show your debating skills in this annual competition. Topics range from current events to philosophy.',
                'coordinator_name' => 'Prof. James Anderson',
                'venue' => 'Lecture Hall B',
                'participants' => ['Students', 'Faculty'],
                'category' => 'other',
                'other_category' => 'Debate Competition',
                'event_type' => 'competition',
                'event_date' => now()->addDays(20), // 20 days from now (upcoming)
                'event_end_date' => now()->addDays(21),
                'registration_end_date' => now()->addDays(17),
                'has_registration_end_date' => true,
                'registration_type' => 'team',
                'team_size' => 2,
                'required_players' => 2,
                'allow_bracketing' => true,
                'bracket_type' => 'double',
                'teams' => 16,
                'rulebook_path' => 'rules/debate-competition-2025.pdf',
                'image_path' => 'events/debate-competition-2025.jpg',
            ],
        ];

        foreach ($events as $eventData) {
            $event = Event::updateOrCreate(
                ['title' => $eventData['title']],
                $eventData
            );
            
            // Create sample event images
            EventImage::create([
                'event_id' => $event->id,
                'image_path' => 'events/' . Str::slug($event->title) . '-1.jpg',
            ]);
            
            EventImage::create([
                'event_id' => $event->id,
                'image_path' => 'events/' . Str::slug($event->title) . '-2.jpg',
            ]);
        }

        $this->command->info('Events created successfully!');
    }
}
