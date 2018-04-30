<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'amenities';
    protected $fillable = [
        'room_id',
        'amenity_item_id'
    ];

    public function rooms()
    {
        return $this->belongsTo('App\TableData\Rooms', 'room_id');
    }

    public function amenity_items()
    {
        return $this->belongsTo('App\TableData\Amenity_items', 'amenity_item_id');
    }
}