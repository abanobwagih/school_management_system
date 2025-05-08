<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'];

        foreach ($grades as $i => $grade) {
            Classroom::create([
                'name' => "Class " . chr(65 + $i),
                'grade_level' => $grade,
            ]);
        }
    }
}
