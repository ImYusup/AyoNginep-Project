<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Room_capacities extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'bed',
        'bathroom',
        'person',
    ];

    public function rooms()
    {
        return $this->hasOne('App\TableData\Rooms');
    }
}

