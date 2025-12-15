<?php

namespace Database\Seeders;

use App\Models\BorrowRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class BorrowRequestsSeeder extends Seeder
{
    public function run(): void
    {
        $borrowRequests = [
            [
                'student_name' => 'John Smith',
                'student_id' => '123456789',
                'email' => 'john.smith@cdd.edu.ph',
                'item_id' => 1, // Basketball
                'status' => 'approved',
                'purpose' => 'Basketball practice session',
                'quantity' => 2,
                'contact_number' => '09123456789',
                'requested_at' => now()->subDays(5),
                'approved_at' => now()->subDays(4),
                'borrowed_at' => now()->subDays(4),
                'return_due_date' => now()->subDays(2),
                'denied_at' => now()->subDays(3),
                'returned_at' => now()->subDays(1),
            ],
            [
                'student_name' => 'Maria Garcia',
                'student_id' => '234567890',
                'email' => 'maria.garcia@cdd.edu.ph',
                'item_id' => 2, // Chess Set
                'status' => 'approved',
                'purpose' => 'Chess tournament preparation',
                'quantity' => 1,
                'contact_number' => '09234567890',
                'requested_at' => now()->subDays(7),
                'approved_at' => now()->subDays(6),
                'borrowed_at' => now()->subDays(6),
                'return_due_date' => now()->subDays(3),
                'denied_at' => now()->subDays(5),
                'returned_at' => now()->subDays(2),
            ],
            [
                'student_name' => 'David Chen',
                'student_id' => '345678901',
                'email' => 'david.chen@cdd.edu.ph',
                'item_id' => 3, // Laptop
                'status' => 'pending',
                'purpose' => 'Research project documentation',
                'quantity' => 1,
                'contact_number' => '09345678901',
                'requested_at' => now()->subDays(2),
                'approved_at' => now()->subDays(1),
                'borrowed_at' => now()->subDays(1),
                'return_due_date' => now()->addDays(2),
                'denied_at' => now()->subDays(1),
                'returned_at' => now()->addDays(3),
            ],
            [
                'student_name' => 'Sarah Johnson',
                'student_id' => '456789012',
                'email' => 'sarah.johnson@cdd.edu.ph',
                'item_id' => 4, // Projector
                'status' => 'denied',
                'purpose' => 'Class presentation',
                'quantity' => 1,
                'contact_number' => '09456789012',
                'requested_at' => now()->subDays(10),
                'approved_at' => now()->subDays(9),
                'borrowed_at' => now()->subDays(9),
                'return_due_date' => now()->subDays(7),
                'denied_at' => now()->subDays(9),
                'returned_at' => now()->subDays(8),
            ],
            [
                'student_name' => 'Michael Brown',
                'student_id' => '567890123',
                'email' => 'michael.brown@cdd.edu.ph',
                'item_id' => 5, // Microphone
                'status' => 'approved',
                'purpose' => 'Audio recording for school event',
                'quantity' => 2,
                'contact_number' => '09567890123',
                'requested_at' => now()->subDays(1),
                'approved_at' => now()->subDays(1),
                'borrowed_at' => now()->subDays(1),
                'return_due_date' => now()->addDays(1),
                'denied_at' => now()->subHours(12),
                'returned_at' => now()->addHours(6),
            ],
        ];

        foreach ($borrowRequests as $request) {
            BorrowRequest::firstOrCreate($request);
        }

        $this->command->info('Borrow requests seeded successfully!');
    }
}
