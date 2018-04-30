<?php

namespace App\Http\Controllers;

use App\TableData\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return photos::all();
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
        photos::create([
            'room_id' => $request -> room_id,
            'image' => $request -> image
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function show(photos $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function edit(photos $photos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photos $photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function destroy(photos $id)
    {
        $id -> delete();
    }
}
