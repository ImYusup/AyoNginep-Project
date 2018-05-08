<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TableData\Users;
use App\TableData\UserFilters;


class UserController extends Controller
{
    public function index()
    {
        return users::all();
    }

    public function show(Users $user)
    {
        return $user;
    }
    public function filter(UserFilters $filters)
    {
        return Users::filterBy($filters)->get();
    }
}