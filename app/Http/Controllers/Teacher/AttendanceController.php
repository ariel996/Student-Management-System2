<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\Teacher;
use App\Student;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance = Attendance::paginate(50);
        return view('teacher.attendance.index', ['attendances' => $attendance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::paginate(50);
        return view('teacher.attendance.create', ['students' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendance = Attendance::create([
            'student_id' => $request->input('student_id'),
            'teacher_id' => $request->input('teacher_id'),
            'attended' => $request->input('attended'),
            'attendance_date' => $request->input('attendance_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time')
        ]);
        if ($attendance) {
            return redirect()->route('attendance.index');
        }
        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('id', $id)->firstOrFail();
        $teacher = Teacher::where('user_id', auth()->user()->id)->firstOrFail();
        return view('teacher.attendance.show', ['student' => $student, 'teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::where('id', $id)->firstOrFail();
        return view('teacher.attendance.edit', ['attendance' => $attendance]);
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
        $attendance = Attendance::where('id', $id)
                                    ->update([
                                        'attented' => $request->input('attended'),
                                        'attendance_date' => $request->input('attendance_date'),
                                        'start_time' => $request->input('start_time'),
                                        'end_time' => $request->input('end_time')
                                    ]);
        if ($attendance) {
            return redirect()->route('attendance.index');
        }
        return redirect()->route('attendance.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::where('id', $id)->firstOrFail();
        $attendance->delete();
        return redirect()->route('attendance.index');
    }
}
