<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return App\TableData\Users::all(); 
});

Route::get('/rooms', function () {
    return App\TableData\Rooms::all(); 
});

Route::get('/categories', function () {
    return App\TableData\Categories::all(); 
});

Route::get('/orders', function () {
    return App\TableData\Orders::all(); 
});

Route::get('/order_details', function () {
    return App\TableData\Order_details::all(); 
});

Route::get('/room_capacities', function () {
    return App\TableData\Room_capacities::all(); 
});

Route::get('/photos', function () {
    return App\TableData\Photos::all(); 
});

Route::get('/amenities', function () {
    return App\TableData\Amenities::all(); 
});

Route::get('/amenity_items ', function () {
    return App\TableData\Amenities::all(); 
});

Route::get('/favorites', function () {
    return App\TableData\Favorites::all(); 
});

