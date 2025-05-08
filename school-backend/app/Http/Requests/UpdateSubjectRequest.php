<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'code' => 'sometimes|unique:subjects,code,' . $this->subject->id,
        ];
    }
}
