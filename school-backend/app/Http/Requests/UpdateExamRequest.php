<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateExamRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'date' => 'sometimes|date',
            'term' => 'sometimes|string',
        ];
    }
}
