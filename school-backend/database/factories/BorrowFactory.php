<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\Book;

class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'book_id' => Book::factory(),
            'borrow_date' => $this->faker->dateTimeThisMonth(),
            'return_date' => $this->faker->optional()->dateTimeBetween('now', '+15 days'),
        ];
    }
}
