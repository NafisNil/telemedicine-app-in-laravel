<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['email', 'phone', 'password', 'full_name', 'dob', 'sex', 'address', 'role', 'slug'];

    // Relationship with Appointment model
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
