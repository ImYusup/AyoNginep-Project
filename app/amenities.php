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
        'room_id',
        'amenity_item_id'
    ];

    public function rooms()
    {
        return $this->belongsTo('App\rooms');
    }

    public function amenity_items()
    {
        return $this->belongsTo('App\amenity_items');
    }
}