<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
            'qualification' => 'required|string',
            'join_date' => 'required|date',
        ];
    }
}
