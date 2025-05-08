<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Exam;

class MarkFactory extends Factory
{
    protected $model = Mark::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'exam_id' => Exam::factory(),
            'mark' => $this->faker->numberBetween(0, 100),
        ];
    }
}
