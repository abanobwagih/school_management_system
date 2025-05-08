<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FeeStructure;

class FeeStructureFactory extends Factory
{
    protected $model = FeeStructure::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'amount' => $this->faker->randomFloat(2, 1000, 5000),
            'grade_level' => $this->faker->randomElement(['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4']),
        ];
    }
}
