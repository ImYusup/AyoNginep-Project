<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'image'
    ];

    public function rooms()
    {
        return $this->belongsTo('App\TableData\Rooms');
    }
}