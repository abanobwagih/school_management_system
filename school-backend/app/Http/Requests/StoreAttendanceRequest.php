<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('teacher');
    }

    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late,excused',
        ];
    }
}
