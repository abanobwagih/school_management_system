<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBorrowRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'student_id' => 'sometimes|exists:students,id',
            'book_id' => 'sometimes|exists:books,id',
            'borrow_date' => 'sometimes|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ];
    }
}
