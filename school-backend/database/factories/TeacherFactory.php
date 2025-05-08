<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;
use App\Models\User;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'qualification' => $this->faker->randomElement(['B.Ed', 'M.Sc', 'Ph.D']),
            'join_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'department_id' => rand(1, 4),
        ];
    }
}
