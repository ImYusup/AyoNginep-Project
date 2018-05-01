<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TableData\Users;

class UserController extends Controller
{
    public function index()
    {
        return users::all();
        // ::with(['favorites', 'rooms', 'orders'])
        //     -> get();
    }

    public function show(Users $user)
    {
        return $user;
    }
}