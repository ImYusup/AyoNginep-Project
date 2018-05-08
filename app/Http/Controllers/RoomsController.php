<?php

namespace App\Http\Controllers;

use App\TableData\Rooms;
use App\TableData\RoomFilters;
use App\TableData\Photos;
use App\TableData\Room_capacities;
use App\TableData\Amenities;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class RoomsController extends Controller
{
    public function index(RoomFilters $filters)
    {
        return Rooms::filterBy($filters)->with(['users','categories','favorites','photos','order_details','room_capacities','amenities'])->paginate(2);
    }
    public function search(Request $request){
        if($request->keyword){
            return Rooms::orderBy('name')
            ->with(['users','categories','favorites','photos','order_details','room_capacities','amenities'])
            ->where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('district', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('address_detail', 'LIKE', '%' . $request->keyword . '%')
            ->orWhereHas('categories', function($q) use ($request){
                $q->where('name', 'LIKE', '%' . $request->keyword . '%');
            })
            ->paginate(1);
        }else{
            return $this->index();
        }
    }
    public function store(Request $request)
    {
        $rar = rooms::create([
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

        $rid = $rar->id;
        
        photos::create([
            'room_id' => $rid,
            'image' => $request -> image
        ]);

        room_capacities::create([
            'room_id' => $rid,
            'bed' => $request -> bed,
            'bathroom' => $request -> bathroom,
            'person' => $request -> person
        ]);

        amenities::create([
            'room_id' => $rid,
            'amenity_item_id' => $request -> amenity_item_id
        ]);
    }

    public function show($id)
    {
        return rooms::with(['categories','favorites','photos','order_details','room_capacities','amenities'])
            -> where('id', $id)
            -> get();
    }

    public function update(Request $request, rooms $room)
    {
        $room -> update($request->all());
    }

    public function destroy(rooms $room)
    {
        $room -> delete();
    }
    

   
}
