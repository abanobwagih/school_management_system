<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Timetable;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;

class TimetableFactory extends Factory
{
    protected $model = Timetable::class;

    public function definition()
    {
        return [
            'classroom_id' => Classroom::factory(),
            'section_id' => Section::factory(),
            'subject_id' => Subject::factory(),
            'teacher_id' => Teacher::factory(),
            'day' => $this->faker->randomElement(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']),
            'start_time' => $this->faker->time('H:i', '12:00'),
            'end_time' => $this->faker->time('H:i', '17:00'),
        ];
    }
}
