<?php

namespace App\Http\Controllers;

use App\TableData\Amenity_items;
use Illuminate\Http\Request;

class AmenityItemsController extends Controller
{
    public function index()
    {
        return amenity_items::with('amenities')
            -> get();
    }

    public function store(Request $request)
    {
        amenity_items::create([
            'item' => $request -> item
        ]);
        return $request;
    }

    public function show($id)
    {
        return amenity_items::with('amenities')
            -> where('id', $id)
            -> get();
    }

    public function update(Request $request, amenity_items $amenity_item)
    {
        $amenity_item ->update($request -> all());        
    }

    public function destroy(amenity_items $amenity_item)
    {
        $amenity_item -> delete();
    }
}
