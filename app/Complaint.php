<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'student_id',
        'complaint_code',
        'complaint_type',
        'complaint_message',
        'complaint_status'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
