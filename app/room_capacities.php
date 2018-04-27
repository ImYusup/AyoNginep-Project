<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_capacities extends Model
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
}

