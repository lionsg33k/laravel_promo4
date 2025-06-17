<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //


    public function index()
    {

        $students = Student::all();
        return view("student.student", compact("students"));
    }


    public function store(Request $request)
    {


        $request->validate([
            "fullName" => "required|max:200|",
            "age" => "required|integer|",
            "school" => "required",
        ]);


        Student::create([
            "name" => $request->fullName,
            "age" => $request->age,
            "school" => $request->school,
        ]);


        return back();
    }


    public function show(Student $student)
    {


        return view("student.partials.student-show", compact("student"));
    }


    public function update(Request $request, Student $student)
    {

        $request->validate([
            "fullName" => "required|max:200|",
            "age" => "required|integer|",
            "school" => "required",
        ]);

        // $student->name = $request->fullName;
        // $student->age = $request->age;
        // $student->save();


        $student->update([
            "name" => $request->fullName,
            "age" => $request->age,
            "school" => $request->school,
        ]);

        return back();
    }


    public function destroy(Student $student)
    {

        $student->delete();

    }
}
