<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];
    // Relationships

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'instructor_id');
    }

    public function assign_course(Course $course)
    {
        $this->courses()->save($course);
    }
}
