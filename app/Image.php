<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'student_id',
        'filename',
        'description',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
