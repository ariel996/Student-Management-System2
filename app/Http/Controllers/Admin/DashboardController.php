<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $count = DB::table('users')->count();
        $school_count = DB::table('schools')->count();
        $teacher_count = DB::table('teachers')->count();
        $student_count = DB::table('students')->count();
        return view('admin.index', ['count' => $count, 'school' => $school_count, 'teacher' => $teacher_count, 'student' => $student_count]);
    }
}
