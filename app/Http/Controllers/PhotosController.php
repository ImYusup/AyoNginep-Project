<?php

namespace App\Http\Controllers;

use App\TableData\Photos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function index()
    {
        
        return photos::with('rooms')
            -> get();
        // return Storage::download('storage/room_photos/1526280060.jpg');

        // $image = $request->file('input_img');
        // $name = time().'.'.$image->getClientOriginalExtension();
        // $path = $image->storeAs('storage/room_photos', $name);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs('public/room_photos', $name);
        $path = str_replace("public","storage",$path);

        photos::create([
            'room_id' => $request -> room_id,
            'image' => $path
        ]);

        return $request;
    }

    public function show($id)
    {
        return photos::with('rooms')
            -> where('room_id', $id)
            -> get();
    }

    public function destroy(photos $photo)
    {
        $photo -> delete();
    }
}
