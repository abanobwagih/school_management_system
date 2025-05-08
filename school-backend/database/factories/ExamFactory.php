<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exam;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'term' => $this->faker->randomElement(['Midterm', 'Final']),
        ];
    }
}
