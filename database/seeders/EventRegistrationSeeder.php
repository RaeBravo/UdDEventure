<?php

namespace Database\Seeders;

use App\Models\EventRegistration;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventRegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $events = Event::all();
        
        foreach ($events as $event) {
            // Create at least one registration for each event
            EventRegistration::create([
                'event_id' => $event->id,
                'event_name' => $event->title,
                'event_date' => $event->event_date,
                'bracket_type' => $event->bracket_type ?? 'single',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 5)),
            ]);
            
            // For some events, create multiple registrations
            if (rand(0, 1)) {
                EventRegistration::create([
                    'event_id' => $event->id,
                    'event_name' => $event->title . ' - Registration 2',
                    'event_date' => $event->event_date,
                    'bracket_type' => $event->bracket_type ?? 'double',
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now()->subDays(rand(1, 5)),
                ]);
            }
        }
        
        $this->command->info('Event registrations seeded successfully!');
    }
}
