<?php

namespace App\Http\Controllers;

use App\TableData\User;
use App\TableData\Favorites;
use App\TableData\Rooms;
use App\TableData\Orders;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    // public $successStatus = 200;
    
    public function index () {
        return User::with(['favorites', 'rooms', 'orders'])
            ->get();
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
     *  register api
     *  @return \Illuminate\Http\Response
     */
    public function register (Request $request)
     {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'address' => 'required',
            // 'phone' => 'required',
            // 'birthday' => 'required',
            // 'gender' => 'required',
            // 'photo' => 'required',
            // 'about' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->error()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // dd($user);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        // dd($success);  
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

    /**
     * this is for CRUD user
     * 
     */
    public function store(Request $request)
    {
        $rar = User::create([
            'email' => $request -> email,
            'password' => $request -> password,
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'address' => $request -> address,
            'phone' => $request -> phone,
            'birthday' => $request -> birthday,
            'gender' => $request -> gender,
            'photo' => $request -> photo,
            'about' => $request -> about
        ]);

        $rid = $rar->id;
        

        // favorites::create([
        //     'room_id' => $rid,
        //     '' => $request -> 
        // ]);

        // rooms::create([
        //     'room_id' => $rid,
        //     '' => $request -> 
        // ]);   

        // orders::create([
        //     'room_id' => $rid,
        //     '' => $request -> 
        // ]);
    }

    public function show($id)
    {
        return User::with(['favorites','rooms','orders'])
            -> where('id', $id)
            -> get();
    }
   
    public function update(Request $request, User $user)
    {
        $user -> update($request->all());
    }

    public function destroy(User $user)
    {
        $user -> delete();
    }

}
