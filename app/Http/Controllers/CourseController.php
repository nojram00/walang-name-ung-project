<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    //

    public function index()
    {
        // Fetch all courses
        $courses = \App\Models\Course::with(['department', 'instructor'])->get();

        // Return a view with the courses data
        // return Inertia::render('courses/index', compact('courses'));
        return view('pages.courses', compact('courses'));
    }

    public function create_view()
    {
        $departments = \App\Models\Department::all();
        $instructors = \App\Models\Instructor::all();
        // return Inertia::render('courses/create/index', compact('departments', 'instructors'));
        return view('pages.create-course', compact('departments', 'instructors'));
    }

    public function create(Request $request)
    {

        try{
            // Create a new course
            $course = new \App\Models\Course([
                'title' => $request->input('title'),
                'credits' => $request->input('credits'),
                'department_id' => $request->input('department_id'),
                'instructor_id' => $request->input('instructor_id'),
            ]);

            $course->save();

            // Redirect to the courses index page with a success message
            return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        }
        catch(\Throwable $e)
        {
            return redirect()->back()->with('error', 'An error occurred while creating the course. ' . $e->getMessage())->withInput();
        }
    }
}
