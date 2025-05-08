<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Mark;

class MarkSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $exam = Exam::first();

        foreach ($students as $student) {
            foreach ($subjects as $subject) {
                Mark::create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'exam_id' => $exam->id,
                    'mark' => rand(40, 100),
                ]);
            }
        }
    }
}
