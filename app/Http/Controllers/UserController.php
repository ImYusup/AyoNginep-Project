<?php

namespace App\Http\Controllers;

use App\TableData\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    // public $successStatus = 200;
    
    public function index () {
        $list  = User::all();
        return $list;
    }
    
    /**
     * login api
     * @return  \Illuminate\Http\Response
     */
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()],401); 
        }
        
        
        if(Auth::attempt(['email' => request ('email'), 'password' => request('password')])){
                $user = Auth::User();
                $success['token'] = $user -> createToken('MyApp') -> accessToken;
                return response()->json(['success' => $success], 200);    
            }
        else {
           return response()->json(['error'=>'Unauthorised'], 401); 
        }    
    }

    /**
     *  Register api
     *  @return \Illuminate\Http\Response
     */
    public function register (Request $request)
     {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'photo' => 'required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->error()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // dd($user);
      $success['token'] = $user->createToken('MyApp')->accessToken;
    //   dd($success);  
        $success['first_name'] = $user-> first_name;
        
        return response()->json(['success'=>$success], 200);
    }

    /**
     * details api
     * @return \Illuminate\Http\Response 
     */
    public function getDetails() {
        $users = User::get();
        return response()->json(['success' => $users], 200);
    }
}
