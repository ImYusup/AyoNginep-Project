<?php

namespace App\TableData;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'phone',
        'birthday',
        'gender',
        'photo',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favorites()
    {
        return $this->hasMany('App\TableData\Favorites');
    }

    public function rooms()
    {
        return $this->hasMany('App\TableData\Rooms');
    }

    public function orders()
    {
        return $this->hasMany('App\TableData\Orders');
    }
}
