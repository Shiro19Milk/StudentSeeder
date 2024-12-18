<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'course' => 'required',
            'year_level' => 'required|integer',
        ]);

        Student::create($request->all()); // 'Student' instead of 'Students'
    
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student) // Use 'Student' instead of 'Students'
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student) // Use 'Student' instead of 'Students'
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required',
            'year_level' => 'required|integer',
        ]);

        $student->update($request->all()); // 'Student' instead of 'Students'
    
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student) // Use 'Student' instead of 'Students'
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student record deleted successfully.');
    }
}