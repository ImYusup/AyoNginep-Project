<?php

namespace App\Http\Controllers;

use App\TableData\Orders;
use App\TableData\Order_details;
use Illuminate\Http\Request;
use App\TableData\Users;
use App\TableData\Rooms;
use App\Mail\LandlordOrder;
use App\Mail\TenantOrder;

class OrdersController extends Controller
{
    public function index()
    {
        return orders::with(['users', 'order_details'])
            -> get();
    }

    public function store(Request $request)
    {
        $mao = orders::create([
            'user_id' => $request -> user_id
        ]);

        $oid = $mao->id;

        order_details::create([
            'order_id' => $oid,
            'room_id' => $request -> room_id,
            'check_in_date' => $request -> check_in_date,
            'check_out_date' => $request -> check_out_date,
            'guest' => $request -> guest
        ]);

        $uid = Rooms::find($request -> room_id)->user_id;
        $landlord = Users::find($uid);
        
        $tenant = Users::find($request -> user_id);

        \Mail::to($landlord -> email) -> send(new LandlordOrder($landlord));
        \Mail::to($tenant -> email) -> send(new TenantOrder($tenant));
    }

    public function show($id)
    {
        return orders::with(['users', 'order_details'])
            -> where('id', $id)
            -> get();
    }

    public function destroy(orders $order)
    {
        $order -> delete();
    }
}
