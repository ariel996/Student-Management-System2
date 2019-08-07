<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Complaint;

class ManageComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaint = Complaint::paginate(25);
        return view('admin.complaint.index', ['complaints' => $complaint]);
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
        $id = $request->input('id');
        $complaint = Complaint::where('id', $id)->firstOrFail();
        //$complaint = new Complaint();

        $complaint->complaint_status = $request->input('complaint_status');
        $complaint->save();
        if ($complaint) {
            return redirect()->route('manageComplaint.index')->with('success', 'successfully validate !!!');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
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
        // $complaint = Complaint::findorFail($complaint->id);
        $complaint = Complaint::where('id', $id)->firstOrFail();
        return view('admin.complaint.edit', ['complaints' => $complaint]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // problem with update function
    {
        $complaint = Complaint::where('id', $id)->firstOrFail();
                                /*->update([
                                    'complaint_message' => $request->input('complaint_message'),
                                    'complaint_status' => $request->input('complaint_status')
                                ]);*/
        $complaint->complaint_status = $request->input('complaint_status');
        $complaint->save();
        if ($complaint) {
            return redirect()->route('manageComplaint.index')->with('success', 'successfully validate !!!');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::where('id', $id)->firstOrFail();
        $complaint->delete();
        return redirect()->route('manageComplaint.index')->with('success', 'successfully deleted');
    }
}
