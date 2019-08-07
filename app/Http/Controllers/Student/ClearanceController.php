<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Clearance;
use PDF;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        return view('student.clearance.show', ['student' => $student]);
    }

    public function download_clearance()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        $pdf = PDF::loadView('student.clearance.clearance_pdf', ['student' => $student]);
        return $pdf->download('Clearance-'.$student->student_matricule,'.pdf');
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
        $clearance = Clearance::create([
            'student_id' => $request->input('student_id')
        ]);
        if ($clearance) {
            return redirect()->route('apply_clearance.index')->with('success', 'Successfully apply for clearance form');
        }
        return redirect()->route('apply_clearance.index')->with('errors', "Error while appying for clearance!!!");
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
