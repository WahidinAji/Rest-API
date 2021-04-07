<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return \response()->json([
            'message' => 'su',
            'data' => $students,
        ], 200);

    }
    public function store(StudentRequest $req)
    {
        $student = new Student();
        $student->name = $req->name;
        $student->alamat = $req->alamat;
        $student->save();
        return \response()->json([
            'message' => "$student->name successfully created!!",
            'data' => $student,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        if (!empty($student)) {
            return \response()->json([
                'message' => 'this is!!',
                'data' => $student,
            ], 201);
        }
        return \response()->json([
            'message' => 'this is nothing matched!!',
        ], 404);
    }
    public function update(Request $req, Student $student)
    {
        $student->name = $req->name;
        $student->alamat = $req->alamat;
        $student->save();
        return \response()->json([
            'message' => "$student->name successfully updated!!",
            'data' => $student,
        ], 200);
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return \response()->json([
            'message' => 'data deleted!!',
        ]);
    }
}
