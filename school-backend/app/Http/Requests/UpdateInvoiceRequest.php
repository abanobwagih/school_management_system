<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return request()->user() && request()->user()->hasRole('admin');
    }

    public function rules()
    {
        return [
            'student_id' => 'sometimes|exists:students,id',
            'fee_structure_id' => 'sometimes|exists:fee_structures,id',
            'amount_due' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:paid,unpaid,pending',
        ];
    }
}
