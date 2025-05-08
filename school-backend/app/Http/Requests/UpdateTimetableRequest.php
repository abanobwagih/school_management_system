<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateTimetableRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('teacher');
    }

    public function rules()
    {
        return [
            'classroom_id' => 'sometimes|exists:classrooms,id',
            'section_id' => 'sometimes|exists:sections,id',
            'subject_id' => 'sometimes|exists:subjects,id',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'day' => 'sometimes|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time' => 'sometimes|date_format:H:i|after:start_time',
        ];
    }
}
