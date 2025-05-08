<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('teacher');
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'description' => 'nullable|string',
            'file_url' => 'nullable|string',
            'subject_id' => 'sometimes|exists:subjects,id',
            'classroom_id' => 'sometimes|exists:classrooms,id',
            'teacher_id' => 'sometimes|exists:teachers,id',
            'due_date' => 'sometimes|date|after:now',
        ];
    }
}
