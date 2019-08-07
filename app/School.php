<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'school_code',
        'school_name',
        'school_description',
    ];

    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
