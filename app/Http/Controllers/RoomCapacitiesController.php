<?php

namespace App\Http\Controllers;

use App\TableData\Room_capacities;
use Illuminate\Http\Request;

class RoomCapacitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return room_capacities::all();
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
        room_capacities::create([
            'room_id' => $request -> room_id,
            'bed' => $request -> bed,
            'bathroom' => $request -> bathroom,
            'person' => $request -> person
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\room_capacities  $room_capacities
     * @return \Illuminate\Http\Response
     */
    public function show(room_capacities $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room_capacities  $room_capacities
     * @return \Illuminate\Http\Response
     */
    public function edit(room_capacities $room_capacities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\room_capacities  $room_capacities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room_capacities $id)
    {
        $id ->update($request -> all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room_capacities  $room_capacities
     * @return \Illuminate\Http\Response
     */
    public function destroy(room_capacities $id)
    {
        $id -> delete();
    }
}
