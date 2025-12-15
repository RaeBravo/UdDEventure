<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Basketball',
                'quantity' => 10,
            ],
            [
                'name' => 'Chess Set',
                'quantity' => 5,
            ],
            [
                'name' => 'Laptop',
                'quantity' => 15,
            ],
            [
                'name' => 'Projector',
                'quantity' => 3,
            ],
            [
                'name' => 'Microphone',
                'quantity' => 8,
            ],
            [
                'name' => 'Table Tennis Set',
                'quantity' => 6,
            ],
            [
                'name' => 'Badminton Racket',
                'quantity' => 12,
            ],
            [
                'name' => 'Speaker System',
                'quantity' => 4,
            ],
        ];

        foreach ($items as $item) {
            Item::firstOrCreate($item);
        }

        $this->command->info('Items seeded successfully!');
    }
}
