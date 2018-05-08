<?php

namespace App\Http\Controllers;

use App\TableData\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function index () {
        return User::with(['rooms','favorites','orders'])
            ->get();
    }
    
    public function register (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'birthday' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->error()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['first_name'] = $user-> first_name;
        $success['access_token'] = $user->createToken('User')->accessToken;
        
        return response()->json($success, 200);

    }
     
    public function show(Users $user)
    {
        return $user;
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
