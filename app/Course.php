<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'department_id',
        'course_type',
        'semester_id',
        'level',
        'course_code',
        'course_name',
        'course_credit',
    ];

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function typecourse()
    {
        return $this->belongsTo('App\typeCourse');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function mark()
    {
        return $this->hasMany('App\Mark');
    }

    public function courseteach()
    {
        return $this->hasOne('App\Courseteach');
    }

    public function studentcourse()
    {
        return $this->hasMany('App\Studentcourse');
    }
}
