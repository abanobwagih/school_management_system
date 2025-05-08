<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $books = [
            ['title' => 'Algebra Basics', 'author' => 'John Doe', 'isbn' => '978-1234567890'],
            ['title' => 'Science 101', 'author' => 'Jane Smith', 'isbn' => '978-0987654321'],
            ['title' => 'World History', 'author' => 'Paul Davis', 'isbn' => '978-1122334455'],
            ['title' => 'English Literature', 'author' => 'Emily Brown', 'isbn' => '978-5566778899'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
