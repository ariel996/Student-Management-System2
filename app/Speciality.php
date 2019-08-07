<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'department_id',
        'speciality_code',
        'speciality_name',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function batches()
    {
        return $this->hasOne('App\Batche');
    }
}
