<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $events = [
            [
                'title' => 'Parent-Teacher Meeting',
                'description' => 'Discuss student progress with parents.',
                'event_date' => now()->addDays(7),
                'target_role' => 'parent',
            ],
            [
                'title' => 'Science Fair',
                'description' => 'Annual school science fair.',
                'event_date' => now()->addDays(14),
                'target_role' => null,
            ],
            [
                'title' => 'Sports Day',
                'description' => 'Annual sports event for all students.',
                'event_date' => now()->addDays(21),
                'target_role' => 'student',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
