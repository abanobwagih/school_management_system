<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'code'];

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
