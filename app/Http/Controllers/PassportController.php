<?php

namespace App\Http\Controllers;

use App\TableData\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     * @return  \Illuminate\Http\Response
     */
    public function login () {
        if (Auth::attempt(['email' => request ('email'), 'password' 
            => request('password')])) {
                $user = Auth::User();
                $success['token'] = $user -> createToken('MyApp') -> 
                    accessToken;
                return response() -> json(['success' => $success], 
                $this-> successStatus);    
            }
        else {
           return response()->json (['error' => 'Unauthorised'], 
           401); 
        }    
    }

    /**
     *  Register api
     *  @return \Illuminate\Http\Response
     */
    public function register (Request $request)
     {
        $validator = Validator::make($reqeust->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator -> fails()) {
            return response()-> json(['error' => $validator
            ->error()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user-> createToken('MyApp')->
            accessToken;
        $success['name'] = $user-> name;
        
        return response()->json (['success' => $success], $this->
                successStatus);
    }

    /**
     * details api
     * @return \Illuminate\Http\Response 
     */
    public function getDetails() {
        $user = Auth::User();
        return response()->json (['success' => $user], $this->
        successStatus);
    }
}
