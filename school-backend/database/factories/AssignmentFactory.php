<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Assignment;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Teacher;

class AssignmentFactory extends Factory
{
    protected $model = Assignment::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'file_url' => null,
            'subject_id' => Subject::factory(),
            'classroom_id' => Classroom::factory(),
            'teacher_id' => Teacher::factory(),
            'due_date' => $this->faker->dateTimeBetween('now', '+15 days'),
        ];
    }
}
