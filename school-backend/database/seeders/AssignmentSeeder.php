<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assignment;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Teacher;

class AssignmentSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();

        foreach ($subjects as $subject) {
            Assignment::create([
                'title' => 'Assignment for ' . $subject->name,
                'description' => fake()->paragraph(),
                'file_url' => null,
                'subject_id' => $subject->id,
                'classroom_id' => $classrooms->random()->id,
                'teacher_id' => $teachers->random()->id,
                'due_date' => fake()->dateTimeBetween('now', '+15 days'),
            ]);
        }
    }
}
