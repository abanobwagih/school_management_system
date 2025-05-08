<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Invoice;

class PaymentSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $invoices = Invoice::where('status', 'paid')->get();

        foreach ($invoices as $invoice) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'amount' => $invoice->amount_due,
                'payment_date' => fake()->dateTimeThisMonth(),
                'method' => fake()->randomElement(['cash', 'card', 'online']),
            ]);
        }
    }
}
