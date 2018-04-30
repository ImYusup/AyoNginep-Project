<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'guest'
    ];

    public function orders()
    {
        return $this->belongsTo('App\TableData\Orders', 'order_id');
    }

    public function rooms()
    {
        return $this->belongsTo('App\TableData\Rooms', 'room_id');
    }
}