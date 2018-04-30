<?php

namespace App\TableData;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany ('App\TableData\Rooms', 'category_id');
    }
}
