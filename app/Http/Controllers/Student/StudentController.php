<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        if ($student) {
            return view('student.show', ['student' => $student]);
        }
        return view('student.create', ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = School::all();
        return view('student.create', ['schools' => $school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_matricule' => 'required',
            'student_name' => 'required',
            'student_surname' => 'required',
            'student_dob' => 'required',
            'student_pob' => 'required',
            'student_phone' => 'required',
            'school_id' => 'required',
            'department_id' => 'required',
            'student_level' => 'required',
            'student_address' => 'required',
            'student_email' => 'required'
        ]);
        $student = Student::create([
            'user_id' => $request->input('user_id'),
            'school_id' => $request->input('school_id'),
            'department_id' => $request->input('department_id'),
            'student_matricule' => $request->input('student_matricule'),
            'student_name' => $request->input('student_name'),
            'student_surname' => $request->input('student_surname'),
            'student_level' => $request->input('student_level'),
            'student_dob' => $request->input('student_dob'),
            'student_pob' => $request->input('student_pob'),
            'student_phone' => $request->input('student_phone'),
            'student_address' => $request->input('student_address'),
            'student_email' => $request->input('student_email')
        ]);
        if ($student) {
            return redirect()->route('student.index')->with('success', 'Your profile has been updated !');
        }
        return redirect()->route('student.index')->with('errors', 'Error while updating the profile !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
