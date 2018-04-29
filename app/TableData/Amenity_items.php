<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Amenity_items extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item'
    ];
    
    public function amenities()
    {
        return $this->hasMany('App\TableData\Amenities');
    }
}
