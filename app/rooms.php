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
        'quantity',
        'desc',
        'user_id',
        'house_rules',
    ];
}
