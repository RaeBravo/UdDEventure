<?php

namespace Database\Seeders;

use App\Models\RegisteredPlayer;
use App\Models\Player;
use App\Models\Event;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        // Get events to associate players with
        $events = Event::all();
        
        if ($events->isEmpty()) {
            $this->command->error('No events found. Please run EventSeeder first.');
            return;
        }

        $players = [
            [
                'event_id' => 1, // Basketball Tournament
                'student_id' => '202500001',
                'name' => 'Juan Dela Cruz',
                'email' => 'juan.delacruz@cdd.edu.ph',
                'department' => 'School of Information Technology',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/1abc123',
                'team_name' => 'Team Alpha',
                'status' => 'active',
            ],
            [
                'event_id' => 1, // Basketball Tournament
                'student_id' => '202500002',
                'name' => 'Maria Santos',
                'email' => 'maria.santos@cdd.edu.ph',
                'department' => 'School of Teacher Education',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/1def456',
                'team_name' => 'Team Alpha',
                'status' => 'active',
            ],
            [
                'event_id' => 2, // Chess Championship
                'student_id' => '202500003',
                'name' => 'Carlos Reyes',
                'email' => 'carlos.reyes@cdd.edu.ph',
                'department' => 'School of Information Technology',
                'age' => 19,
                'gdrive_link' => 'https://drive.google.com/document/d/1ghi789',
                'team_name' => 'Team Beta',
                'status' => 'active',
            ],
            [
                'event_id' => 2, // Chess Championship
                'student_id' => '202500004',
                'name' => 'Ana Martinez',
                'email' => 'ana.martinez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 22,
                'gdrive_link' => 'https://drive.google.com/document/d/1jkl012',
                'team_name' => 'Team Beta',
                'status' => 'active',
            ],
            [
                'event_id' => 3, // Programming Hackathon
                'student_id' => '202500005',
                'name' => 'Luis Garcia',
                'email' => 'luis.garcia@cdd.edu.ph',
                'department' => 'School of Information Technology',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/1mno345',
                'team_name' => 'Team Gamma',
                'status' => 'active',
            ],
            [
                'event_id' => 3, // Programming Hackathon
                'student_id' => '202500006',
                'name' => 'Sofia Rodriguez',
                'email' => 'sofia.rodriguez@cdd.edu.ph',
                'department' => 'School of Engineering',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/1pqr678',
                'team_name' => 'Team Gamma',
                'status' => 'active',
            ],
            [
                'event_id' => 4, // Music Festival
                'student_id' => '202500007',
                'name' => 'Miguel Lopez',
                'email' => 'miguel.lopez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 19,
                'gdrive_link' => 'https://drive.google.com/document/d/1stu901',
                'team_name' => 'Team Delta',
                'status' => 'active',
            ],
            [
                'event_id' => 4, // Music Festival
                'student_id' => '202500008',
                'name' => 'Isabella Fernandez',
                'email' => 'isabella.fernandez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/1vwx234',
                'team_name' => 'Team Delta',
                'status' => 'active',
            ],
            [
                'event_id' => 5, // Science Exhibition
                'student_id' => '202500009',
                'name' => 'Roberto Castillo',
                'email' => 'roberto.castillo@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/1yzab567',
                'team_name' => 'Team Epsilon',
                'status' => 'active',
            ],
            [
                'event_id' => 5, // Science Exhibition
                'student_id' => '202500010',
                'name' => 'Gabriela Reyes',
                'email' => 'gabriela.reyes@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/2cde890',
                'team_name' => 'Team Epsilon',
                'status' => 'active',
            ],
            [
                'event_id' => 5, // Science Exhibition
                'student_id' => '202500011',
                'name' => 'Antonio Santos',
                'email' => 'antonio.santos@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 22,
                'gdrive_link' => 'https://drive.google.com/document/d/3fgh123',
                'team_name' => 'Team Epsilon',
                'status' => 'active',
            ],
            [
                'event_id' => 6, // Art Workshop
                'student_id' => '202500012',
                'name' => 'Carmen Lopez',
                'email' => 'carmen.lopez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 19,
                'gdrive_link' => 'https://drive.google.com/document/d/4ijk456',
                'team_name' => 'Team Zeta',
                'status' => 'active',
            ],
            [
                'event_id' => 6, // Art Workshop
                'student_id' => '202500013',
                'name' => 'Diego Martinez',
                'email' => 'diego.martinez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/5lmn789',
                'team_name' => 'Team Zeta',
                'status' => 'active',
            ],
            [
                'event_id' => 7, // Debate Competition
                'student_id' => '202500014',
                'name' => 'Patricia Garcia',
                'email' => 'patricia.garcia@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/6opq012',
                'team_name' => 'Team Theta',
                'status' => 'active',
            ],
            [
                'event_id' => 7, // Debate Competition
                'student_id' => '202500015',
                'name' => 'Ricardo Fernandez',
                'email' => 'ricardo.fernandez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 22,
                'gdrive_link' => 'https://drive.google.com/document/d/7rst345',
                'team_name' => 'Team Theta',
                'status' => 'active',
            ],
            [
                'event_id' => 7, // Debate Competition
                'student_id' => '202500016',
                'name' => 'Monica Rodriguez',
                'email' => 'monica.rodriguez@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/8uvw678',
                'team_name' => 'Team Theta',
                'status' => 'active',
            ],
            [
                'event_id' => 1, // Basketball Tournament
                'student_id' => '202500017',
                'name' => 'Daniel Kim',
                'email' => 'daniel.kim@cdd.edu.ph',
                'department' => 'School of Information Technology',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/9xyz123',
                'team_name' => 'Team Alpha',
                'status' => 'active',
            ],
            [
                'event_id' => 2, // Chess Championship
                'student_id' => '202500018',
                'name' => 'Emily Chen',
                'email' => 'emily.chen@cdd.edu.ph',
                'department' => 'School of Business and Accountancy',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/9abc456',
                'team_name' => 'Team Beta',
                'status' => 'active',
            ],
            [
                'event_id' => 3, // Programming Hackathon
                'student_id' => '202500019',
                'name' => 'Michael Rodriguez',
                'email' => 'michael.rodriguez@cdd.edu.ph',
                'department' => 'School of Engineering',
                'age' => 22,
                'gdrive_link' => 'https://drive.google.com/document/d/9def789',
                'team_name' => 'Team Gamma',
                'status' => 'active',
            ],
            [
                'event_id' => 4, // Music Festival
                'student_id' => '202500020',
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 19,
                'gdrive_link' => 'https://drive.google.com/document/d/9ghi012',
                'team_name' => 'Team Delta',
                'status' => 'active',
            ],
            [
                'event_id' => 5, // Science Exhibition
                'student_id' => '202500021',
                'name' => 'James Wilson',
                'email' => 'james.wilson@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/9jkl345',
                'team_name' => 'Team Epsilon',
                'status' => 'active',
            ],
            [
                'event_id' => 6, // Art Workshop
                'student_id' => '202500022',
                'name' => 'Lisa Anderson',
                'email' => 'lisa.anderson@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 20,
                'gdrive_link' => 'https://drive.google.com/document/d/9mno678',
                'team_name' => 'Team Zeta',
                'status' => 'active',
            ],
            [
                'event_id' => 7, // Debate Competition
                'student_id' => '202500023',
                'name' => 'Robert Taylor',
                'email' => 'robert.taylor@cdd.edu.ph',
                'department' => 'School of Business and Accountancy',
                'age' => 22,
                'gdrive_link' => 'https://drive.google.com/document/d/9pqr901',
                'team_name' => 'Team Theta',
                'status' => 'active',
            ],
            [
                'event_id' => 1, // Basketball Tournament
                'student_id' => '202500024',
                'name' => 'Amanda Martinez',
                'email' => 'amanda.martinez@cdd.edu.ph',
                'department' => 'School of Health and Sciences',
                'age' => 19,
                'gdrive_link' => 'https://drive.google.com/document/d/9stu234',
                'team_name' => 'Team Alpha',
                'status' => 'active',
            ],
            [
                'event_id' => 2, // Chess Championship
                'student_id' => '202500025',
                'name' => 'Kevin Brown',
                'email' => 'kevin.brown@cdd.edu.ph',
                'department' => 'School of Humanities',
                'age' => 21,
                'gdrive_link' => 'https://drive.google.com/document/d/9vwx567',
                'team_name' => 'Team Beta',
                'status' => 'active',
            ],
        ];

        foreach ($players as $player) {
            Player::updateOrCreate(
                ['student_id' => $player['student_id']],
                $player
            );
        }
        

        $this->command->info('Players seeded successfully!');
    }
}
