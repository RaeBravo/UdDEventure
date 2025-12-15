<?php

namespace Database\Seeders;

use App\Models\Requirement;
use App\Models\Event;
use Illuminate\Database\Seeder;

class RequirementsSeeder extends Seeder
{
    public function run(): void
    {
        $events = Event::all();
        
        $requirements = [
            [
                'title' => 'Medical Certificate',
                'description' => 'Valid medical certificate from licensed physician',
                'file_path' => 'requirements/medical_certificate.pdf',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Parental Consent',
                'description' => 'Signed parental consent form for participants under 18',
                'file_path' => 'requirements/parental_consent.pdf',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Registration Fee',
                'description' => 'Payment of 100 pesos registration fee',
                'file_path' => 'requirements/registration_fee.pdf',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Team Registration',
                'description' => 'Complete team member list with contact information',
                'file_path' => 'requirements/team_registration.pdf',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Project Proposal',
                'description' => 'Brief project proposal and tech stack',
                'file_path' => 'requirements/project_proposal.pdf',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Performance Track',
                'description' => 'Demo track or performance video',
                'file_path' => 'requirements/performance_track.mp3',
                'uploaded_by' => 1,
            ],
            [
                'title' => 'Research Abstract',
                'description' => '250-word abstract of research project',
                'file_path' => 'requirements/research_abstract.pdf',
                'uploaded_by' => 1,
            ],
        ];

        foreach ($requirements as $requirement) {
            Requirement::firstOrCreate($requirement);
        }

        $this->command->info('Requirements seeded successfully!');
    }
}
