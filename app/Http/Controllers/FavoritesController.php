<?php

namespace App\Http\Controllers;

use App\TableData\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return favorites::all();
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
        favorites::create([
            'user_id' => $request -> user_id,
            'room_id' => $request -> room_id
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function show(favorites $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function edit(favorites $favorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favorites $favorites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorites $id)
    {
        $id->delete();
    }
}
