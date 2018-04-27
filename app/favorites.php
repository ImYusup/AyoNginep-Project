<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'room_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function rooms()
    {
        return $this->belongsTo('App\rooms');
    }
}
