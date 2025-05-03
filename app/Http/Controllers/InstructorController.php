<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InstructorController extends Controller
{
    //

    public function index()
    {
        // Fetch all instructors
        $instructors = \App\Models\Instructor::all();

        // Return a view with the instructors data
        // return Inertia::render('instructors/index', compact('instructors'));
        return view('pages.instructors', compact('instructors'));
    }

    public function create_view()
    {
        // return inertia('instructors/create/index');
        return view('pages.create-instructor');
    }

    public function create(Request $request)
    {
        try
        {
            // Create a new instructor
            $instructor = new Instructor([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            $instructor->save();

            // Redirect back to the instructors index with a success message
            return redirect()->route('instructors.index')->with('success', 'Instructor created successfully.');
        }
        catch(\Throwable $e)
        {
            return redirect()->route('instructors.create.index')->with('error', 'An error occurred while creating the instructor.' . $e->getMessage())->withInput();
        }
    }
}
