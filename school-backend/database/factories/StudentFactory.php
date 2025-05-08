<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\User;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'registration_no' => 'REG' . $this->faker->unique()->numberBetween(1000, 9999),
            'birthdate' => $this->faker->dateTimeBetween('-18 years', '-14 years'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'classroom_id' => rand(1, 4),
            'section_id' => rand(1, 8),
        ];
    }
}
