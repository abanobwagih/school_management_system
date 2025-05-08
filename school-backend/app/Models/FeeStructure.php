<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = ['title', 'amount', 'grade_level'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
