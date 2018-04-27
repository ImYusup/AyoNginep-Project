<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class amenities extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_amenity_id',
        'amenity_item_id'
    ];
}