<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $grades = [
            ['name' => 'A', 'from_mark' => 90, 'to_mark' => 100],
            ['name' => 'B', 'from_mark' => 80, 'to_mark' => 89],
            ['name' => 'C', 'from_mark' => 70, 'to_mark' => 79],
            ['name' => 'D', 'from_mark' => 60, 'to_mark' => 69],
            ['name' => 'F', 'from_mark' => 0, 'to_mark' => 59],
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
