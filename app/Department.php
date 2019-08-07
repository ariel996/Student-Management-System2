<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'school_id',
        'department_code',
        'department_name',
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function specialities()
    {
        return $this->hasMany('App\Speciality');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function courseteache()
    {
        return $this->hasOne('App\Courseteach');
    }
}
