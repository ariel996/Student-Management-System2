<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clearance;

class ClearanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clearance = Clearance::paginate(20);
        return view('admin.clearance.index', ['clearance' => $clearance]);
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
        $clearance = Clearance::where('id', $id)->firstOrFail();

        $clearance->library = $request->input('library');
        $clearance->exam_record = $request->input('exam_record');
        $clearance->department = $request->input('department');
        $clearance->clearance_date = $request->input('clearance_date');
        $clearance->remark = $request->input('remark');
        $clearance->save();
        if ($clearance) {
            return redirect()->route('clearance_form.index')->with('success', 'successfully validate !!!');
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
        $clearance = Clearance::where('id', $id)->firstOrFail();
        return view('admin.clearance.create', ['clearance' => $clearance]);
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
        $clearance = Clearance::where('id', $id)->firstOrFail();
        $clearance->student_id = $request->input('student_id');
        $clearance->library = $request->input('library');
        $clearance->exam_record = $request->input('exam_record');
        $clearance->department = $request->input('department');
        $clearance->clearance_date = $request->input('clearance_date');
        $clearance->remark = $request->input('remark');
        $clearance->save();
        return redirect()-route('clearance_form.index');
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
