<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Student;

class BorrowSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $books = Book::all();
        $students = Student::all();

        foreach ($students->take(5) as $student) {
            Borrow::create([
                'student_id' => $student->id,
                'book_id' => $books->random()->id,
                'borrow_date' => now()->subDays(rand(1, 10)),
                'return_date' => now()->addDays(rand(5, 15)),
            ]);
        }
    }
}
