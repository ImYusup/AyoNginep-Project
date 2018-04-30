<?php

namespace App\Http\Controllers;

use App\TableData\Room_capacities;
use Illuminate\Http\Request;

class RoomCapacitiesController extends Controller
{
    public function index()
    {
        return room_capacities::with('rooms')
            -> get();
    }

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

    public function show($id)
    {
        return room_capacities::with('rooms')
            -> where('id', $id)
            -> get();
    }

    public function update(Request $request, room_capacities $room_capacity)
    {
        $room_capacity ->update($request -> all());
    }

    public function destroy(room_capacities $room_capacity)
    {
        $room_capacity -> delete();
    }
}
