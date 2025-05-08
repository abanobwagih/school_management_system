<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Section;
use App\Models\Classroom;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Section A', 'Section B']),
            'classroom_id' => Classroom::factory(),
        ];
    }
}
