<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'nullable|string|unique:books,isbn',
        ];
    }
}
