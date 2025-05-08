<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateSubmissionRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('student');
    }

    public function rules()
    {
        return [
            'student_id' => 'sometimes|exists:students,id',
            'assignment_id' => 'sometimes|exists:assignments,id',
            'file_url' => 'nullable|string',
            'status' => 'sometimes|in:submitted,pending,late',
        ];
    }
}
