<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

class ClassroomFactory extends Factory
{
    protected $model = Classroom::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'grade_level' => $this->faker->randomElement(['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4']),
        ];
    }
}
