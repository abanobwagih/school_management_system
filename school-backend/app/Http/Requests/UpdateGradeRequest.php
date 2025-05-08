<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateGradeRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'from_mark' => 'sometimes|integer|min:0',
            'to_mark' => 'sometimes|integer|gt:from_mark',
        ];
    }
}
