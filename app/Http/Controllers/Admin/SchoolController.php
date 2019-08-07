<?php

namespace App\Http\Controllers\Admin;

use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        if (Auth::check()) {
            $schools = School::paginate(5);
            return view('admin.school.create', ['schools' => $schools]);
        }
        return view('auth.login');
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
            'school_code' => 'required:max:10',
            'school_name' => 'required:max:70',
            'school_description' => 'required:max:255'
        ]);
        if (Auth::check()) {
            $school = School::create([
                'school_code' => $request->input('school_code'),
                'school_name' => $request->input('school_name'),
                'school_description' => $request->input('school_description')
            ]);
            if ($school){
                return redirect()->route('school.create')->with('success', 'School created successfuly !!!');
            }
            return redirect()->route('school.create')->with('errors', 'Error while creating new school !!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $school = School::find($school->id);
        $schools = School::paginate(5);
        return view('admin.school.edit', ['school' => $school, 'schools' => $schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $schoolUpdate = School::where('id', $school->id)
                                ->update([
                                    'school_code' => $request->input('school_code'),
                                    'school_name' => $request->input('school_name'),
                                    'school_description' => $request->input('school_description')
                                ]);
        $schools = School::paginate(5);

        if ($schoolUpdate) {
            return redirect()->route('school.create', ['schools' => $schools]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $findSchool = School::find($school->id);
        $schools = School::paginate(5);
        if($findSchool->delete()) {
            return redirect()->route('school.create', ['schools' => $schools])
                            ->with('success', 'School deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'School could not be deleted !!');
    }
}
