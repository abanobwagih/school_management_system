<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'date' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['present', 'absent', 'late', 'excused']),
        ];
    }
}
