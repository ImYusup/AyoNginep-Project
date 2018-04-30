<?php

namespace App\Http\Controllers;

use App\rooms;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allrooms = rooms::all();
        return ($allrooms);
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
        rooms::create([
            'name' => $request -> name,
            'district' => $request -> district,
            'coordinate' => $request -> coordinate,
            'address_detail' => $request -> address_detail,
            'category_id' => $request -> category_id,
            'rent' => $request -> rent,
            'desc' => $request -> desc,
            'user_id' => $request -> user_id,
            'house_rules' => $request -> house_rules
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(rooms $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(rooms $rooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rooms $id)
    {
        $id -> name = "{$request -> name}";
        // $id -> district = "{$request -> district}";
        // $id -> coordinate = "{$request -> coordinate}";
        // $id -> address_detail = "{$request -> address_detail}";
        // $id -> category_id = "{$request -> category_id}";
        // $id -> rent = "{$request -> rent}";
        // $id -> desc = "{$request -> desc}";
        // $id -> user_id = "{$request -> user_id}";
        // $id -> house_rules = "{$request -> house_rules}";
        $id->save();
        // $cek = $request->name;
        // return ($id-> name = 'precil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(rooms $rooms)
    {
        //
    }
}
