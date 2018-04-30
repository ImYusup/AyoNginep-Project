<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'orders';
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\TableData\Users', 'user_id');
    }

    public function order_details()
    {
        return $this->hasOne('App\TableData\Order_details', 'order_id');
    }
}
