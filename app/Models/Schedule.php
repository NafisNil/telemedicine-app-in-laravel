<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'doctor_id',
        'day',
        'start',
        'end',
        'status'
    ];

    // Relationship with Appointment model
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Relationship with Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
