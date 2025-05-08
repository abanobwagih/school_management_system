<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreGradeRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'from_mark' => 'required|integer|min:0',
            'to_mark' => 'required|integer|gt:from_mark',
        ];
    }
}
