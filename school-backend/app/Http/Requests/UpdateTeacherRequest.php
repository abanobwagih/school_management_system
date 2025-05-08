<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
            'qualification' => 'sometimes|string',
            'join_date' => 'sometimes|date',
        ];
    }
}
