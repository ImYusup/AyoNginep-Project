<?php

namespace App\Http\Controllers\AuthData;
use Illuminate\Http\Request;
use App\TableData\Users;

class UserController extends Controller
{
    public function  listUser () {
        $list  = Users::all();
        return $list;
    }
}