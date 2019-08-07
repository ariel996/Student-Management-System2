<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('admin.teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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
            'teacher_matricule' => 'required',
            'teacher_name' => 'required',
            'teacher_surname' => 'required',
            'teacher_grade' => 'required',
            'teacher_phone' => 'required:max:15',
            'teacher_email' => 'required:max:255'
        ]);

        $teacher = Teacher::create([
            'user_id' => $request->input('user_id'),
            'teacher_matricule' => $request->input('teacher_matricule'),
            'teacher_name' => $request->input('teacher_name'),
            'teacher_surname' => $request->input('teacher_surname'),
            'teacher_grade' => $request->input('teacher_grade'),
            'teacher_phone' => $request->input('teacher_phone'),
            'teacher_email' => $request->input('teacher_email')
        ]);

        if ($teacher) {
            return redirect()->route('teacher.create')->with('success', 'Teacher has been created successfully');
        }
        return redirect()->route('teacher.create')->with('errors', 'Error while creating new teacher into the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::find($teacher->id);
        return view('admin.teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacherUpdate = Teacher::where('id', $teacher->id)
                                    ->update([
                                        'teacher_matricule' => $request->input('teacher_matricule'),
                                        'teacher_name' => $request->input('teacher_name'),
                                        'teacher_surname' => $request->input('teacher_surname'),
                                        'teacher_grade' => $request->input('teacher_grade'),
                                        'teacher_phone' => $request->input('teacher_phone'),
                                        'teacher_email' => $request->input('teacher_email')
                                    ]);
        $teachers = Teacher::paginate(10);
        if ($teacherUpdate) {
            return redirect()->route('teacher.index', ['teacher' => $teachers]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $findTeacher = Teacher::find($teacher->id);
        if($findTeacher->delete()) {
            return redirect()->route('teacher.create')
                            ->with('success', 'Teacher deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'Teacher could not be deleted !!');
    }
}
