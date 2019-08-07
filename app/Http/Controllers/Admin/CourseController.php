<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Department;
use App\School;
use App\TypeCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(15);
        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $schools = School::all();
        $course_type = TypeCourse::all();
        return view('admin.courses.create', ['departments' => $departments, 'schools' => $schools, 'course_type' => $course_type]);
    }

    public function fetchDepartments(Request $request)
    {
        if($request->ajax()) {
            $departments = DB::table('departments')->where('school_id', $request->school_id)->pluck('department_name','id')->all();
            $data = view('admin.courses.ajax_select', ['departments' => $departments])->render();
            return response()->json(['options' => $data]);
        }
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
            'department_id' => 'required',
            'course_type' => 'required',
            'level' => 'required',
            'course_code' => 'required',
            'course_name' => 'required',
            'course_credit' => 'required'
        ]);
        $course = Course::create([
            'department_id' => $request->input('department_id'),
            'course_type' => $request->input('course_type'),
            'semester_id' => $request->input('semester_id'),
            'level' => $request->input('level'),
            'course_code' => $request->input('course_code'),
            'course_name' => $request->input('course_name'),
            'course_credit' => $request->input('course_credit')
        ]);

        if ($course) {
            return redirect()->route('course.create')->with('success', 'Course has been added successfully !!');
        }
        return redirect()->route('course.create')->with('errors', 'Error while creating new course into the system !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course = Course::find($course->id);
        $schools = School::all();
        $course_type = TypeCourse::all();
        return view('admin.courses.edit', ['courses' => $course, 'schools' => $schools, 'course_type' => $course_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $courseUpdate = Course::where('id', $course->id)
                                ->update([
                                    'department_id' => $request->input('department_id'),
                                    'course_type' => $request->input('course_type'),
                                    'semester_id' => $request->input('semester_id'),
                                    'level' => $request->input('level'),
                                    'course_code' => $request->input('course_code'),
                                    'course_name' => $request->input('course_name'),
                                    'course_credit' => $request->input('course_credit')
                                ]);
        if ($courseUpdate) {
            return redirect()->route('course.index');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $findCourse = Course::find($course->id);
        if($findCourse->delete())
        {
            return redirect()->route('course.index')->with('success', 'Course deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'Course could not be deleted !!');
    }
}
