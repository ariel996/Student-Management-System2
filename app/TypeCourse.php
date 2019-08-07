<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCourse extends Model
{
    protected $fillable = [
        'type_code',
        'type_description',
    ];

    public function courses()
    {
        return $this->hasOne('App\Course');
    }
}
