<?php

namespace App\Http\Controllers;

use App\TableData\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        return favorites::with(['users', 'rooms'])
            -> get();
    }

    public function store(Request $request)
    {
        favorites::create([
            'user_id' => $request -> user_id,
            'room_id' => $request -> room_id
        ]);
        return $request;
    }

    public function show()
    {
        $me = Auth::user()->id;

        return favorites::with('rooms')
            -> where('user_id', $me)
            -> get();
    }

    public function destroy(favorites $favorite)
    {
        $favorite->delete();
    }
}
