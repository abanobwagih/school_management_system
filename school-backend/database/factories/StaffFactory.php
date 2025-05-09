<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
           'department_id' => 1, // or null, or use override from seeder
            'position' => $this->faker->jobTitle(),
            'hire_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
        ];
    }
}
