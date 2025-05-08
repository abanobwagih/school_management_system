<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\FeeStructure;
use App\Models\Student;

class InvoiceSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $students = Student::all();
        $fees = FeeStructure::all();

        foreach ($students as $student) {
            Invoice::create([
                'student_id' => $student->id,
                'fee_structure_id' => $fees->random()->id,
                'amount_due' => rand(1000, 5000),
                'status' => fake()->randomElement(['paid', 'unpaid', 'pending']),
            ]);
        }
    }
}
