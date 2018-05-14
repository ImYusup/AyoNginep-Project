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
        $path = $image->storeAs('storage/room_photos', $name);
        // Storage::disk('local')->put('file.txt', 'Contents');
        photos::create([
            'room_id' => $request -> room_id,
            'image' => $image
        ]);

        return $request;
    }

    public function show($id)
    {
        return photos::with('rooms')
            -> where('id', $id)
            -> get();
    }

    public function destroy(photos $photo)
    {
        $photo -> delete();
    }
}
