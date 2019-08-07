<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'fees_code',
        'amount',
        'fees_type',
    ];

    public function students()
    {
        return $this->belongsTo('App\Student');
    }
}
