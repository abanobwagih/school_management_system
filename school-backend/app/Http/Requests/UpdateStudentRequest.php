<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'classroom_id' => 'nullable|exists:classrooms,id',
            'section_id' => 'nullable|exists:sections,id',
            'registration_no' => 'sometimes|unique:students,registration_no,' . $this->student->id,
            'birthdate' => 'sometimes|date',
            'gender' => 'sometimes|in:male,female',
        ];
    }
}
