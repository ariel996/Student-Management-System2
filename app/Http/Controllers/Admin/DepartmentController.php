<?php

namespace App\Http\Controllers\Admin;

use App\School;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        $schools = School::all();
        $departments = Department::paginate(5);
        return view('admin.department.create', ['schools' => $schools, 'departments' => $departments]);
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
            'school_id' => 'required',
            'department_code' => 'required:max:70',
            'department_name' => 'required:max:255'
        ]);
        if (Auth::check()) {
            $department = Department::create([
                'school_id' => $request->input('school_id'),
                'department_code' => $request->input('department_code'),
                'department_name' => $request->input('department_name')
            ]);
            if ($department){
                return redirect()->route('department.create')->with('success', 'Department created successfuly !!!');
            }
            return redirect()->route('department.create')->with('errors', 'Error while creating new department !!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department = Department::find($department->id);
        $schools = School::all();
        $departments = Department::paginate(5);
        return view('admin.department.edit', ['department' => $department, 'departments' => $departments, 'schools' => $schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $departmentUpdate = Department::where('id', $department->id)
                                        ->update([
                                            'school_id' => $request->input('school_id'),
                                            'department_code' => $request->input('department_code'),
                                            'department_name' => $request->input('department_name')
                                        ]);
        $departments = Department::paginate(5);
        if ($departmentUpdate) {
            return redirect()->route('department.create', ['departments' => $departments]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $findDepartment = Department::find($department->id);

        $departments = Department::paginate(5);

        if($findDepartment->delete()) {
            return redirect()->route('department.create', ['departments' => $departments])
                            ->with('success', 'Department deleted successfully !!');
        }
        return back()->withInput()->with('errors', 'Department could not be deleted !!');
    }
}
