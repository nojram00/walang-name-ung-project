<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'department_id',
    ];

    // Relationships

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function assign_department(Department $department)
    {
        $this->department()->associate($department);
        $this->save();
    }
}
