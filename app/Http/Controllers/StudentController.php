<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch all students
        $students = \App\Models\Student::with('department')->get();

        // Return a view with the students data
        return Inertia::render('students/index', compact('students'));
    }

    public function create_view()
    {
        $departments = Department::all();
        return Inertia::render('students/create/index', compact('departments'));
    }

    public function create(Request $request)
    {
        try
        {
            // Create a new student
            $student = new Student([
                'name' => $request->input('name'),
            ]);

            $student->assign_department(Department::find($request->input('department_id')));

            // Redirect back to the students index with a success message
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        }
        catch(\Throwable $e)
        {
            return redirect()->route('students.create.index')->with('error', 'An error occurred while creating the student.' . $e->getMessage());
        }
    }
}
