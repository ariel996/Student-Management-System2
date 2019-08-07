<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Complaint;
use Illuminate\Support\Facades\Auth;
use DB;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
        $complaints = Complaint::where('student_id', $student->id)->paginate(25);
        return view('student.complaint.index', ['complaints' => $complaints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        return view ('student.complaint.create',['student' => $student]);
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
            'complaint_message' => 'required'
        ]);
        $complaint = Complaint::create([
            'student_id' => $request->input('student_id'),
            'complaint_code' => strtoupper(str_random(6)),
            'complaint_type' => $request->input('complaint_type'),
            'complaint_message' => $request->input('complaint_message')
        ]);
        if ($complaint) {
            return redirect()->route('complaint.create')->with('success', 'You complaint has been sent !!');
        }
        return redirect()->route('complaint.create')->with('errors', 'Error while sending your complaint !');
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
    public function edit(Complaint $complaint)
    {
        $complaint = Complaint::find($complaint->id);
        return view('student.complaint.edit', ['complaint' => $complaint]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $complaintUpdate = Complaint::where('id', $complaint->id)
                                    ->update([
                                        'complaint_type' => $request->input('complaint_type'),
                                        'complaint_message' => $request->input('complaint_message')
                                    ]);
        $complaint = Complaint::paginate(10);
        if ($complaintUpdate) {
            return redirect()->route('complaint.index', ['complaint' => $complaint]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $findComplaint = Complaint::find($complaint->id);
        if ($findComplaint->delete()) {
            return redirect()->route('complaint.index')
                ->with('success', 'Complaint deleted successfully');
        }

        return back()->withInput()->with('error', 'Complaint could not be deleted');
    }
}
