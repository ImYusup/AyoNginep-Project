<?php

namespace App\Http\Controllers;

use App\TableData\Rooms;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function index()
    {
        return rooms::all();
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

    public function update(Request $request, rooms $id)
    {
        $id ->update($request -> all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(rooms $id)
    {
        $id->delete();
    }
}
