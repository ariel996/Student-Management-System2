<?php

namespace App\Http\Controllers\Teacher;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$teachers = Teacher::all();
        $teacher = Teacher::where('user_id', auth()->user()->id)->first();
        if ($teacher) {
            return view('teacher.index', ['teacher' => $teacher]);
        }
        return view('teacher.create');
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
            return redirect()->route('dashboard.index')->with('success', 'successfully fill the profile');
        }
        return redirect()->route('dashboard.index')->with('errors', 'error while filling the profile');
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
