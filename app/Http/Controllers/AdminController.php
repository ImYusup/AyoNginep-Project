<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // dd($validator -> fails());
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()],401); 
        }
        
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            $admin = Auth::Admin();
            $success['token'] = $admin -> createToken('Admin') -> accessToken;
            return response()->json($success, 200);    
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }
}
