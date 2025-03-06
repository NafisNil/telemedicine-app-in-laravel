<?php

namespace App\Models;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $table = 'users';
    protected $fillable = [
        'full_name',
        'name',
        'password',
        'phone',
        'role',
        'address',
        'dob',
        'specialization_id',
        'email',
        'experience',
        'bio',
        'photo',
        'license_number',
        'status',
        'slug',
        'price',
    ];

    public function specialization_name()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id','id');
    }
}
