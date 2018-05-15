<?php

namespace App\Http\Controllers;

use App\TableData\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        return categories::with('rooms')
            -> get();
    }

    public function store(Request $request)
    {
        categories::create([
            'name' => $request -> name
        ]);
        return $request;
    }

    public function show($id)
    {
        return categories::with('rooms')
            -> where('room_id', $id)
            -> get();
    }

    public function update(Request $request, categories $category)
    {
        $category ->update($request -> all());
    }

    public function destroy(categories $category)
    {
        $category->delete();
    }
}