<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'num_semester',
        'annee_univ',
    ];

    public function marks()
    {
        return $this->hasOne('App\Mark');
    }

    public function course()
    {
        return $this->hasOne('App\Course');
    }
}
