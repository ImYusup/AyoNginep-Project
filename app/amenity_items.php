<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class amenity_items extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item'
    ];
}
