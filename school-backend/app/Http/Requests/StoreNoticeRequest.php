<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreNoticeRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'target_role' => 'nullable|in:student,teacher,parent',
            'posted_by' => 'required|exists:users,id',
        ];
    }
}
