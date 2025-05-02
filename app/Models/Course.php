<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'credits',
        'department_id',
        'instructor_id',
    ];
    // Relationships

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'instructor_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function assign_instructor(Instructor $instructor)
    {
        $this->instructor()->associate($instructor);
        $this->save();
    }

    public function assign_department(Department $department)
    {
        $this->department()->associate($department);
        $this->save();
    }
}
