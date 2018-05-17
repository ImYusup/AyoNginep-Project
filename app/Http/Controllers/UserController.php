<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail; 
use App\TableData\Favorites;
use App\TableData\Orders;
use App\TableData\Rooms;
use App\TableData\User;
use App\TableData\UserFilters;
use App\TableData\VerifyUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;



class UserController extends Controller
{
    use AuthenticatesUsers;

    public function index (UserFilters $filters) {
        return User::filterBy($filters)->with(['favorites' => function($query){
            $query->with('rooms');
        }, 'rooms', 'orders'])->get();
    }

    public function login(Request $request){

        $url = 'http://localhost:8000/oauth/token';

        $user = User::where('email', $request->email)
            ->first();

        if(Hash::check($request->password, $user->password)){
            if($user -> verified){
                $response = \Requests::post($url,array(),[
                    'email' => $request->email,
                    'password' => $request->password,
                    'client_id' => 2,
                    'client_secret' => 'WtkGX4tzOvD1JfA60Bj0Bwm79DZmvXzUsrJ3lrhJ',
                    'grant_type' => 'password',
                    'newProvider' => 'user'
                ]);
                return $response->body;
            } else {
                return 'We sent you an activation code. Check your email and click on the link to verify.';
            }
        } else {
            return 'Your email/password is invalid.';
        }
    }

    public function show()
    {
        $me = Auth::user()->id;
        $query = User::with(['favorites' => function($query){
            $query->with('rooms');
        }, 'rooms', 'orders'])
        ->where('id',$me)
        ->get();

        return $query;
    }

    public function update(Request $request)
    {
        $me = Auth::user()->id;
        $user = User::where('id',$me);

        $user -> update($request->all());

        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $path = $photo->storeAs('public/user_photos', $name);
            $user->update(['photo' => $path]);
            
        }
    }

    public function destroy()
    {
        $me = Auth::user()->id;
        $user = User::where('id',$me);

        $user -> delete();
    }

}
