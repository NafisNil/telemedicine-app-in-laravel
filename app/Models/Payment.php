<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    // Relationship with Patient model

    // Relationship with Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    // Relationship with Appointment model
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id');
    }
}
