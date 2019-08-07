<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::middleware(['auth'])->group(function(){
    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin');
    Route::resource('/admin/school', 'Admin\SchoolController');
    Route::resource('/admin/department', 'Admin\DepartmentController');
    Route::resource('/admin/speciality', 'Admin\SpecialityController');
    Route::resource('/admin/user_management', 'Admin\UserController');
    Route::resource('/admin/teacher', 'Admin\TeacherController');
    Route::resource('/admin/course', 'Admin\CourseController');
    Route::resource('/admin/manageComplaint', 'Admin\ManageComplaintController');
    Route::resource('/admin/manage_student', 'Admin\ManagerStudentController');
    Route::resource('/admin/assign_course', 'Admin\CourseTeacherController');

    Route::post('/assign_courses', 'Admin\CourseTeacherController@fetchCourses')->name('assign_courses');

    Route::resource('/admin/semester', 'Admin\SemesterController');
    Route::resource('/admin/type_course', 'Admin\TypeCourseController');
    Route::resource('/admin/clearance_form', 'Admin\ClearanceFormController');
    Route::resource('/admin/image', 'Admin\ImageController');

    Route::post('/fetchDepartments', 'Admin\CourseController@fetchDepartments')->name('fetch_departments');
    // end admin routes


    // Teacher route
    Route::resource('/teacher/dashboard', 'Teacher\DashboardController');
    Route::resource('/teacher/attendance', 'Teacher\AttendanceController');
    Route::resource('/teacher/mark', 'Teacher\MarkController');


    // Student routes
    Route::get('/student/dashboard', 'Student\DashboardController@index')->name('student');
    Route::resource('/student/student', 'Student\StudentController');
    Route::resource('/student/complaint', 'Student\ComplaintController');
    Route::resource('/student/course_registration', 'Student\CourseRegistrationController');
    Route::post('/fetchCourses', 'Student\CourseRegistrationController@fetch_courses')->name('fetch_courses');
    Route::resource('/student/form_b', 'Student\FormbController');
    Route::get('/student/downloadPDF', 'Student\FormbController@downloadPDF')->name('download_pdf');
    Route::get('/student/download_clearance', 'Student\ClearanceController@download_clearance')->name('downloadClearance');
    Route::resource('/student/apply_clearance', 'Student\ClearanceController');
});
