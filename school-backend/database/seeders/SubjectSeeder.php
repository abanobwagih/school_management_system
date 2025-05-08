<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $subjects = [
            ['name' => 'Mathematics', 'code' => 'MATH101'],
            ['name' => 'Science', 'code' => 'SCI101'],
            ['name' => 'History', 'code' => 'HIS101'],
            ['name' => 'English', 'code' => 'ENG101'],
        ];

        foreach ($subjects as $sub) {
            Subject::create($sub);
        }
    }
}
