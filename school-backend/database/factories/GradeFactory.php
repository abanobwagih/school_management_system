<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grade;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'F']),
            'from_mark' => $this->faker->numberBetween(0, 100),
            'to_mark' => $this->faker->numberBetween(0, 100),
        ];
    }
}
