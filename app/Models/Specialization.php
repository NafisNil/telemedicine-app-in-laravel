<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
class Specialization extends Model
{
    //
    protected $fillable = ['title', 'description', 'photo', 'slug'];
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
