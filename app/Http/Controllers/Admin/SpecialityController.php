<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Speciality;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $schools = School::all();
        $specialities = Speciality::paginate(5);
        return view('admin.specialities.create', ['schools' => $schools, 'specialities' => $specialities]);
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
            'speciality_code' => 'required|max:9',
            'speciality_name' => 'required|max:125'
        ]);

        $speciality = Speciality::create([
            'department_id' => $request->input('department_id'),
            'speciality_code' => $request->input('speciality_code'),
            'speciality_name' => $request->input('speciality_name')
        ]);
        if ($speciality) {
            return redirect()->route('speciality.create')->with('success', 'Speciality created successfuly !!!');
        }
        return redirect()->route('speciality.create')->with('errors', 'Error while creating new speciality !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        $speciality = Speciality::find($speciality->id);
        $specialities = Speciality::paginate(5);
        $departments = Department::All();
        return view('admin.specialities.edit', ['speciality' => $speciality, 'specialities' => $specialities, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        $specialityUpdate = Speciality::where('id', $speciality->id)
                                        ->update([
                                            'department_id' => $request->input('department_id'),
                                            'speciality_code' => $request->input('speciality_code'),
                                            'speciality_name' => $request->input('speciality_name')
                                        ]);
        $specialities = Speciality::paginate(5);
        if ($specialityUpdate) {
            return redirect()->route('speciality.create', ['specialities' => $specialities]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        $findSpeciality = Speciality::find($speciality->id);

        $specialities = Speciality::paginate(5);

        if($findSpeciality->delete()) {
            return redirect()->route('speciality.create', ['specialities' => $specialities])
                            ->with('success', 'Speciality deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'Speciality could not be deleted !!');
    }
}
