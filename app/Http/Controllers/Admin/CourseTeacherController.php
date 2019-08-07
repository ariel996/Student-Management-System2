<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Course;
use App\Courseteach;
use App\Teacher;
use DB;
use App\School;

class CourseTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_teaches = Courseteach::paginate(25);
        return view('admin.teacher.list_courses', ['course_teaches' => $course_teaches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $teachers = Teacher::all();
        $schools = School::all();
        return view('admin.teacher.assign', ['departments' => $departments, 'teachers' => $teachers, 'schools' => $schools]);
    }

    public function fetchCourses(Request $request)
    {
        if($request->ajax()) {
            $courses = DB::table('courses')->where('department_id', $request->department_id)->pluck('course_name','id')->all();
            $data = view('admin.teacher.ajax_select_courses', ['courses' => $courses])->render();
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
        $course_teaches = Courseteach::create([
            'course_id' => $request->input('course_id'),
            'teacher_id' => $request->input('teacher_id'),
            'department_id' => $request->input('department_id')
        ]);
        if ($course_teaches) {
            return redirect()->route('assign_course.create')->with('success', 'Course was well assigned');
        }
        return redirect()->route('assign_course.create')->with('errors', 'Unable to assign a course');
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
        $courseteach = Courseteach::where('id', $id)->firstOrFail();
        $departments = Department::all();
        $teachers = Teacher::all();
        return view('admin.teacher.edit_teach', ['courseteach' => $courseteach, 'teachers' => $teachers, 'departments' => $departments]);
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
        $courseteach = Courseteach::where('id', $id)->firstOrFail();
        $courseteach->course_id = $request->get('course_id');
        $courseteach->teacher_id = $request->get('teacher_id');
        $courseteach->department_id = $request->get('department_id');

        $courseteach->save();
        return redirect()->route('assign_course.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseteach = Courseteach::where('id', $id)->firstOrFail();
        $courseteach->delete();
        return redirect()->route('assign_course.index')->with('success', 'deleted successfully.');
    }
}
