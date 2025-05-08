<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateParentProfileRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'phone' => 'sometimes|string',
            'address' => 'sometimes|string',
        ];
    }
}
