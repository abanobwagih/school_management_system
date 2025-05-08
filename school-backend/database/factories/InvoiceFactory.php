<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;
use App\Models\Student;
use App\Models\FeeStructure;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'fee_structure_id' => FeeStructure::factory(),
            'amount_due' => $this->faker->randomFloat(2, 1000, 5000),
            'status' => $this->faker->randomElement(['paid', 'unpaid', 'pending']),
        ];
    }
}
