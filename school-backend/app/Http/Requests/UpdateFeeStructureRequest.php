<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateFeeStructureRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'amount' => 'sometimes|numeric|min:0',
            'grade_level' => 'sometimes|string',
        ];
    }
}
