<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TableData\Users;

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
    public function store(Request $request)
    {
        // $user = new Users;
        // $users->email = $request->email;
        // $users->password = $request->password;
        // $users->save();
        
    }
    public function update(Request $request, Users $user)
    {
        $user -> update($request->all());
    }

    public function destroy(Users $user)
    {
        $user -> delete();
    }

}