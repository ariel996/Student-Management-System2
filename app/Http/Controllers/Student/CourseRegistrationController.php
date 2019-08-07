<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\School;
use App\Studentcourse;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        $schools = School::all();
        return view('student.course.create', ['schools' => $schools, 'student' => $student]);
    }

    public function fetch_courses(Request $request)
    {
        $courses = DB::table('courses')
                    ->where('department_id', '=', $request->department_id)
                    ->where('level', '=', $request->level)
                    ->pluck('course_name', 'id')
                    ->all();
        $data = view('student.course.ajax_create', ['courses' => $courses])->render();
        return response()->json(['options' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->get('course_id') as $course_id)
        {
            $student_course =  new Studentcourse();
            $student_course->student_id = $request->get('student_id');
            $student_course->course_id = $course_id;
            $student_course->save();
        }
        return redirect()->route('course_registration.create')->with('success', 'successfully added');
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
