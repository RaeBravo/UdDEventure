<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $facultyUser = User::where('email', 'faculty@example.com')->first();
        
        if (!$facultyUser) {
            $this->command->error('Faculty user not found. Please run UserSeeder first.');
            return;
        }

        $newsItems = [
            [
                'title' => 'Annual Sports Meet 2025',
                'slug' => 'annual-sports-meet-2025',
                'category' => 'sports',
                'description' => 'Join us for the most exciting annual sports meet featuring various competitions and activities for all students.',
                'date' => now()->subDays(10),
                'status' => 'active',
                'image' => 'news/sports-meet-2025.jpg',
            ],
            [
                'title' => 'New Faculty Members Welcome',
                'slug' => 'new-faculty-members-welcome',
                'category' => 'announcement',
                'description' => 'We are pleased to welcome our new faculty members who will be joining us this semester.',
                'date' => now()->subDays(7),
                'status' => 'active',
                'image' => 'news/faculty-welcome.jpg',
            ],
            [
                'title' => 'Technology Workshop Series',
                'slug' => 'technology-workshop-series',
                'category' => 'academic',
                'description' => 'Enhance your skills with our upcoming technology workshop series covering the latest trends in IT.',
                'date' => now()->subDays(5),
                'status' => 'active',
                'image' => 'news/tech-workshop.jpg',
            ],
            [
                'title' => 'Cultural Festival Registration Open',
                'slug' => 'cultural-festival-registration-open',
                'category' => 'events',
                'description' => 'Registration is now open for our annual cultural festival. Don\'t miss this opportunity to showcase your talents.',
                'date' => now()->subDays(3),
                'status' => 'active',
                'image' => 'news/cultural-fest.jpg',
            ],
            [
                'title' => 'Campus Renovation Update',
                'slug' => 'campus-renovation-update',
                'category' => 'facilities',
                'description' => 'Latest updates on the ongoing campus renovation project and new facilities coming soon.',
                'date' => now()->subDays(1),
                'status' => 'pending',
                'image' => 'news/renovation-update.jpg',
            ],
        ];

        foreach ($newsItems as $item) {
            News::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'faculty_id' => $facultyUser->id,
                    'faculty_name' => $facultyUser->name,
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'description' => $item['description'],
                    'date' => $item['date'],
                    'status' => $item['status'],
                    'image' => $item['image'],
                ]
            );
        }

        $this->command->info('News items created successfully!');
    }
}
