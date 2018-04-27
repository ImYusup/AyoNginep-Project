<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function order_details()
    {
        return $this->hasOne('App\order_details');
    }
}
