<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $students = Student::all();

        foreach ($students as $student) {
            Attendance::create([
                'student_id' => $student->id,
                'date' => fake()->dateTimeThisMonth(),
                'status' => fake()->randomElement(['present', 'absent', 'late', 'excused']),
            ]);
        }
    }
}
