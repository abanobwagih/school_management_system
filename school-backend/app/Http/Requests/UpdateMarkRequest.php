<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateMarkRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('teacher');
    }

    public function rules()
    {
        return [
            'student_id' => 'sometimes|exists:students,id',
            'subject_id' => 'sometimes|exists:subjects,id',
            'exam_id' => 'sometimes|exists:exams,id',
            'mark' => 'sometimes|integer|min:0|max:100',
        ];
    }
}
