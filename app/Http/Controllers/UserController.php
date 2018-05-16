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
        $user = User::where('email', $request->email)
            // ->where('password', Hash::check($request->password))
            ->first();

        dd(Hash::check($request->password, $user->password));

        if($user){
            if($user -> verified && $request -> newProvider == 'user'){
                $success['access_token'] = $user->createToken('User')->accessToken;
                return $success;
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

        return User::with(['favorites' => function($query){
            $query->with('rooms');
        }, 'rooms', 'orders'])
        ->where('id',$me)
        ->get();
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
            $path = $photo->storeAs('storage/user_photos', $name);
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
