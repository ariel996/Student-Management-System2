<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'teacher_matricule',
        'teacher_name',
        'teacher_surname',
        'teacher_grade',
        'teacher_phone',
        'teacher_email',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function courseteach()
    {
        return $this->hasMany('App\Courseteach');
    }

    public function attendance()
    {
        return $this->hasOne('App\Attendace');
    }
}
