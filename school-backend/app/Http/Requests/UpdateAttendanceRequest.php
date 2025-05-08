<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('teacher');
    }

    public function rules()
    {
        return [
            'student_id' => 'sometimes|exists:students,id',
            'date' => 'sometimes|date',
            'status' => 'sometimes|in:present,absent,late,excused',
        ];
    }
}
