<?php

namespace App\Http\Controllers;

use App\TableData\Order_details;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function index()
    {
        return order_details::with(['orders', 'rooms'])
            -> get();
    }

    public function store(Request $request)
    {
        order_details::create([
            'order_id' => $request -> order_id,
            'room_id' => $request -> room_id,
            'check_in_date' => $request -> check_in_date,
            'check_out_date' => $request -> check_out_date,
            'guest' => $request -> guest
        ]);
        return $request;
    }

    public function show($id)
    {
        return order_details::with(['orders', 'rooms'])
            -> where('room_id', $id)
            -> get();
    }

    public function destroy(order_details $order_detail)
    {
        $order_detail -> delete();
    }
}
