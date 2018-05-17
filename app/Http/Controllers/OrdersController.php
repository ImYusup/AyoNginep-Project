<?php

namespace App\Http\Controllers;

use App\Mail\LandlordOrder;
use App\Mail\TenantOrder;
use App\TableData\Order_details;
use App\TableData\Orders;
use App\TableData\Rooms;
use App\TableData\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        return orders::with(['users', 'order_details'])
            -> get();
    }

    public function store(Request $request)
    {
        $me = Auth::user()->id;

        $mao = orders::create([
            'user_id' => $me
        ]);

        $oid = $mao->id;

        order_details::create([
            'order_id' => $oid,
            'room_id' => $request -> room_id,
            'check_in_date' => $request -> check_in_date,
            'check_out_date' => $request -> check_out_date,
            'guest' => $request -> guest
        ]);

        $uid = Rooms::find($request -> room_id);
        $landlord = Users::find($uid->user_id);
        
        $tenant = Users::find($request -> user_id);

        $uid->update(['status' => 0]);

        \Mail::to($landlord -> email) -> send(new LandlordOrder($landlord));
        \Mail::to($tenant -> email) -> send(new TenantOrder($tenant));
    }

    public function show($id)
    {
        return orders::with(['users', 'order_details'])
            -> where('user_id', $id)
            -> get();
    }

    public function destroy(orders $order)
    {
        $order -> delete();
    }
}
