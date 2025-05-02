<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        // Fetch all departments
        $departments = \App\Models\Department::all();

        // Return a view with the departments data
        return inertia('departments/index', compact('departments'));
    }

    public function create_view()
    {
        return inertia('departments/create/index');
    }

    public function create(Request $request)
    {
        try
        {
            // Create a new department
            $department = \App\Models\Department::create([
                'name' => $request->input('name'),
                'office' => $request->input('office'),
            ]);

            // Redirect back to the departments index with a success message
            return redirect()->route('departments.index')->with('success', 'Department created successfully.');
        }
        catch(\Throwable $e)
        {
            return redirect()->route('departments.create.index')->with('error', 'An error occurred while creating the department.');
        }
    }
}
