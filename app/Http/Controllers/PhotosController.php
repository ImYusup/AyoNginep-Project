<?php

namespace App\Http\Controllers;

use App\TableData\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        return photos::with('rooms')
            -> get();
    }

    public function store(Request $request)
    {
        photos::create([
            'room_id' => $request -> room_id,
            'image' => $request -> image
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
