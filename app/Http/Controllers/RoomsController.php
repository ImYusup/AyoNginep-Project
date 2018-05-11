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
        return Rooms::filterBy($filters)
            ->with(['users','categories','favorites','photos','order_details','room_capacities','amenities'=>function ($query) {
                $query->with('amenity_items');
            }])
            ->paginate(12);
    }
    
    public function store(Request $request)
    {
        $url = 'https://reverse.geocoder.cit.api.here.com/6.2/reversegeocode.json?app_id=cyoIR0bqbo4hNigrb3hB&app_code=HQZB4JTf6AO2co3O0D-ZMA&mode=retrieveAddresses&prox='.$request->coordinate.',250';
        $response = \Requests::get($url)->body;
        $address = json_decode($response, JSON_OBJECT_AS_ARRAY);
        $address = $address['Response']['View'][0]['Result'][0]['Location']['Address'];

        $rar = rooms::create([
                'name' => $request -> name,
                'district' => $address['District'],
                'city' => $address['City'],
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
        return rooms::with(['categories','favorites','photos','order_details','room_capacities','amenities'=>function ($query) {
            $query->with('amenity_items');
        }])
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
