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
        return $this->belongsTo('App\TableData\Users');
    }

    public function favorites()
    {
        return $this->hasMany('App\TableData\Favorites');
    }

    public function categories()
    {
        return $this->belongsTo('App\TableData\Categories');
    }

    public function photos()
    {
        return $this->hasMany('App\TableData\Photos');
    }

    public function order_details()
    {
        return $this->hasMany('App\TableData\Order_details');
    }

    public function room_capacities()
    {
        return $this->hasMany('App\TableData\Room_capacities');
    }

    public function amenities()
    {
        return $this->hasMany('App\TableData\Amenities');
    }
}
