<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreFeeStructureRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'grade_level' => 'required|string',
        ];
    }
}
