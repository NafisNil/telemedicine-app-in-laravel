<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'schedule_id', 'status'];



    // Relationship with Doctor model
    public function doctor_name()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    // Relationship with Schedule model
    public function schedule_name()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
