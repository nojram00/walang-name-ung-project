<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'office',
    ];

    protected $primaryKey = 'department_id';

    // Relationships

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id', 'department_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id', 'department_id');
    }

    public function add_student(Student $student)
    {
        $this->students()->save($student);
    }

    public function add_course(Course $course)
    {
        $this->courses()->save($course);
    }
}
