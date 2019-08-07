<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'school_id',
        'department_id',
        'student_matricule',
        'student_name',
        'student_surname',
        'student_level',
        'student_dob',
        'student_pob',
        'student_phone',
        'student_address',
        'student_email',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function attendance()
    {
        return $this->hasOne('App\Attendance');
    }

    public function mark()
    {
        return $this->hasOne('App\Mark');
    }

    public function fee()
    {
        return $this->hasOne('App\Fee');
    }

    public function complaint()
    {
        return $this->hasMany('App\Complaint');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function studentcourse()
    {
        return $this->hasMany('App\Studentcourse');
    }

    public function clearance()
    {
        return $this->hasOne('App\Clearance');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
