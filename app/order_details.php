<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'guest'
    ];
}