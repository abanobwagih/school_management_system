<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateNoticeRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'content' => 'sometimes|string',
            'target_role' => 'nullable|in:student,teacher,parent',
            'posted_by' => 'sometimes|exists:users,id',
        ];
    }
}
