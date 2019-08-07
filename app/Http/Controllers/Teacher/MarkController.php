<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mark;
use App\Student;
use App\Studentcourse;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_courses = Studentcourse::paginate(15);
        return view('teacher.marks.index', ['student_courses' => $student_courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('course_id');
        $student_id = $request->input('student_id');

        $mark = Mark::where('course_id', $id)->first();
        $mark->course_id = $request->input('course_id');
        $mark->student_id = $request->input('student_id');
        $mark->semester_id = $request->input('semester_id');
        $mark->mark_ca = $request->input('mark_ca');
        $mark->mark_exam = $request->input('exam_mark');
        $mark->mark_resit = $request->input('mark_resit');

        $mark->save();
        /*$mark = Mark::create([
            'course_id' => $request->input('course_id'),
            'student_id' => $request->input('student_id'),
            'semester_id' => $request->input('semester_id'),
            'mark_ca' => $request->input('mark_ca'),
            'mark_exam' => $request->input('exam_mark'),
            'mark_resit' => $request->input('mark_resit')
        ]);*/
        if($mark) {
            return redirect()->route('mark.index')->with('success', 'successfully added');
        }
        return back()->withInput();
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
        $student_course = Studentcourse::where('id', $id)->firstOrFail();
        return view('teacher.marks.edit', ['student_course' => $student_course]);
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
        $mark = Mark::find('id', $id)->firstOrFail();
        if ($mark->delete()) {
            return redirect()->route('mark.index')
                ->with('success', 'Mark deleted successfully');
        }

        return back()->withInput()->with('error', 'Mark could not be deleted');
    }
}
