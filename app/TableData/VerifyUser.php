<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    //
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\TableData\User','user_id');
    }
}
