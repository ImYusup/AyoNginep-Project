<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'district',
        'coordinate',
        'address_detail',
        'category_id',
        'rent',
        'desc',
        'user_id',
        'house_rules',
    ];

    public function users()
    {
        return $this->belongsTo('App\TableData\User', 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany('App\TableData\Favorites', 'room_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\TableData\Categories', 'category_id');
    }

    public function photos()
    {
        return $this->hasMany('App\TableData\Photos', 'room_id');
    }

    public function order_details()
    {
        return $this->hasMany('App\TableData\Order_details', 'room_id');
    }

    public function room_capacities()
    {
        return $this->hasOne('App\TableData\Room_capacities', 'room_id');
    }

    public function amenities()
    {
        return $this->hasMany('App\TableData\Amenities', 'room_id');
    }
}
