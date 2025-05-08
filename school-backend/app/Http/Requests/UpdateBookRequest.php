<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'author' => 'sometimes|string',
            'isbn' => 'nullable|string|unique:books,isbn,' . $this->book->id,
        ];
    }
}
