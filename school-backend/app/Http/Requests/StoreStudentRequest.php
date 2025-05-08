<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'classroom_id' => 'nullable|exists:classrooms,id',
            'section_id' => 'nullable|exists:sections,id',
            'registration_no' => 'required|unique:students,registration_no',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
        ];
    }
}
