<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notice;
use App\Models\User;

class NoticeFactory extends Factory
{
    protected $model = Notice::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(),
            'target_role' => $this->faker->optional()->randomElement(['student', 'teacher', 'parent', null]),
            'posted_by' => User::factory(),
            'posted_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
