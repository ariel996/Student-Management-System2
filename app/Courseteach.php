<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courseteach extends Model
{
    protected $fillable = [
        'course_id',
        'teacher_id',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
