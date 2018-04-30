<?php

namespace App\Http\Controllers;

use App\TableData\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return amenities::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        amenities::create([
            'room_id' => $request -> room_id,
            'amenity_item_id' => $request -> amenity_item_id
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function show(amenities $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit(amenities $amenities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, amenities $amenities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy(amenities $id)
    {
        $id -> delete();
    }
}
