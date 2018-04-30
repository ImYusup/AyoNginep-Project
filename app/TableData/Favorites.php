<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
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
        return $this->belongsTo('App\TableData\User');
    }

    public function rooms()
    {
        return $this->belongsTo('App\TableData\Rooms');
    }
}
