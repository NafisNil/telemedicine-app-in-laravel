<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Tip extends Model
{
    //
    protected $fillable = ['problem', 'remedy', 'symptoms', 'user_id'];
    public function username($user_id){
        $user = DB::table('users')->where('id',$user_id)->first();
        return $user;
    }
}
