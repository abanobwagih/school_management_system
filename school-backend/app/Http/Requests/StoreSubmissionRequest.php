<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreSubmissionRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('student');
    }

    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'assignment_id' => 'required|exists:assignments,id',
            'file_url' => 'nullable|string',
            'status' => 'required|in:submitted,pending,late',
        ];
    }
}
