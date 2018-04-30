<?php

namespace App\Http\Controllers;

use App\TableData\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function index()
    {
        return amenities::with(['rooms', 'amenity_items'])
            -> get();
    }

    public function store(Request $request) 
    {
        amenities::create([
            'room_id' => $request -> room_id,
            'amenity_item_id' => $request -> amenity_item_id
        ]);
        return $request;
    }

    public function show($id)
    {
        return amenities::with(['rooms', 'amenity_items'])
            -> where('id', $id)
            -> get();
    }

    public function destroy(amenities $amenity)
    {
        $amenity -> delete();
    }
}
