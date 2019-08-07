<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    protected $fillable = [
        'student_id',
        'library',
        'exam_record',
        'department',
        'clearance_date',
        'remark',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
