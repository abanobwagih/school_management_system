<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('student');

            Student::create([
                'user_id' => $user->id,
                'registration_no' => 'REG' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                'birthdate' => fake()->dateTimeBetween('-18 years', '-14 years'),
                'gender' => fake()->randomElement(['male', 'female']),
                'classroom_id' => rand(1, 4),
                'section_id' => rand(1, 8),
            ]);
        });
    }
}
