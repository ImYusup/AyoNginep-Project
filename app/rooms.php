<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        return $this->belongsTo('App\User');
    }

    public function favorites()
    {
        return $this->hasMany('App\favorites');
    }

    public function categories()
    {
        return $this->belongsTo('App\categories');
    }

    public function photos()
    {
        return $this->hasMany('App\photos');
    }

    public function order_details()
    {
        return $this->hasMany('App\order_details');
    }

    public function room_capacities()
    {
        return $this->hasMany('App\room_capacities');
    }

    public function amenities()
    {
        return $this->hasMany('App\amenities');
    }
}
