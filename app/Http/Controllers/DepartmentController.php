<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        return view('departments.index', compact('departments'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new department in the database
        Department::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
                // Retrieve the department by ID
                $department = Department::findOrFail($id);

                // Return the view to display the department details
                return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
                // Retrieve the department by ID for editing
                $department = Department::findOrFail($id);

                // Return the edit view with the department data
                return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find the department and update it
        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // Find the department and delete it
        $department = Department::findOrFail($id);
        $department->delete();

        // Redirect back with a success message
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
