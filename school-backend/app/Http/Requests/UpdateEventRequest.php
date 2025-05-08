<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'event_date' => 'sometimes|date',
            'target_role' => 'nullable|in:student,teacher,parent',
        ];
    }
}
