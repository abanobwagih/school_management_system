<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('teacher');

            Teacher::create([
                'user_id' => $user->id,
                'qualification' => fake()->randomElement(['B.Ed', 'M.Sc', 'Ph.D']),
                'join_date' => fake()->dateTimeBetween('-10 years', 'now'),
                'department_id' => rand(1, 4),
            ]);
        });
    }
}
