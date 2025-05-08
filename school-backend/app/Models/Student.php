<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'classroom_id', 'section_id', 'registration_no', 'birthdate', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function parents()
    {
        return $this->belongsToMany(ParentProfile::class, 'student_parent');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
