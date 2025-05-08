<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timetable;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;

class TimetableSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
        public function run()
    {
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $classrooms = Classroom::all();
        $sections = Section::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        foreach ($classrooms as $classroom) {
            foreach ($days as $day) {
                Timetable::create([
                    'classroom_id' => $classroom->id,
                    'section_id' => $sections->random()->id,
                    'subject_id' => $subjects->random()->id,
                    'teacher_id' => $teachers->random()->id,
                    'day' => $day,
                    'start_time' => '09:00',
                    'end_time' => '10:00',
                ]);
            }
        }
    }
}
