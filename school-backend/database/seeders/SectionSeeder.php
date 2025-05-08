<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        foreach (Classroom::all() as $classroom) {
            Section::create([
                'name' => 'Section A',
                'classroom_id' => $classroom->id,
            ]);

            Section::create([
                'name' => 'Section B',
                'classroom_id' => $classroom->id,
            ]);
        }
    }
}
