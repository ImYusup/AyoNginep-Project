<?php

namespace App\Http\Controllers;

use App\TableData\Orders;
use App\TableData\Order_details;
use Illuminate\Http\Request;

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

        return $request;
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
