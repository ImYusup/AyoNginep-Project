<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];
}
