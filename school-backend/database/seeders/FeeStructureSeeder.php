<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeeStructure;

class FeeStructureSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'];

        foreach ($grades as $grade) {
            FeeStructure::create([
                'title' => "Tuition for $grade",
                'amount' => rand(1000, 5000),
                'grade_level' => $grade,
            ]);
        }
    }
}
