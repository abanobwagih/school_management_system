<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'target_role' => 'nullable|in:student,teacher,parent',
        ];
    }
}
