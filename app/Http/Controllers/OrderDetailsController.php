<?php

namespace App\Http\Controllers;

use App\TableData\Order_details;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return order_details::all();
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
        order_details::create([
            'order_id' => $request -> order_id,
            'room_id' => $request -> room_id,
            'check_in_date' => $request -> check_in_date,
            'check_out_date' => $request -> check_out_date,
            'guest' => $request -> guest
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function show(order_details $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function edit(order_details $order_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_details $order_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(order_details $id)
    {
        $id -> delete();
    }
}
