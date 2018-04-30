<?php

namespace App\Http\Controllers;

use App\TableData\Amenity_items;
use Illuminate\Http\Request;

class AmenityItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return amenity_items::all();
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
        amenity_items::create([
            'item' => $request -> item
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\amenity_items  $amenity_items
     * @return \Illuminate\Http\Response
     */
    public function show(amenity_items $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\amenity_items  $amenity_items
     * @return \Illuminate\Http\Response
     */
    public function edit(amenity_items $amenity_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\amenity_items  $amenity_items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, amenity_items $id)
    {
        $id ->update($request -> all());        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\amenity_items  $amenity_items
     * @return \Illuminate\Http\Response
     */
    public function destroy(amenity_items $id)
    {
        $id -> delete();
    }
}
