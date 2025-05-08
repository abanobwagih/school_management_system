<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\Invoice;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'invoice_id' => Invoice::factory(),
            'amount' => $this->faker->randomFloat(2, 1000, 5000),
            'payment_date' => $this->faker->dateTimeThisMonth(),
            'method' => $this->faker->randomElement(['cash', 'card', 'online']),
        ];
    }
}
