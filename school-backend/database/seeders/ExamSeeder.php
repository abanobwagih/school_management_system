<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $terms = ['Midterm', 'Final'];

        foreach ($terms as $term) {
            Exam::create([
                'name' => $term . ' Exam',
                'date' => fake()->dateTimeBetween('now', '+30 days'),
                'term' => $term,
            ]);
        }
    }
}
