<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'code' => 'SUB' . $this->faker->unique()->numberBetween(100, 999),
        ];
    }
}
