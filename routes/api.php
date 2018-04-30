<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/favorites', 'FavoritesController@index');
Route::get('/favorites/{id}', 'FavoritesController@show');
Route::post('/favorites', 'FavoritesController@store');
Route::delete('/favorites/{id}', 'FavoritesController@destroy');

Route::get('/rooms', 'RoomsController@index');
Route::get('/rooms/{id}', 'RoomsController@show');
Route::post('/rooms', 'RoomsController@store');
Route::patch('/rooms/{id}', 'RoomsController@update');
Route::delete('/rooms/{id}', 'RoomsController@destroy');

Route::get('/categories','CategoriesController@index');
Route::get('/categories/{id}','CategoriesController@show');
Route::post('/categories','CategoriesController@store');
Route::patch('/categories/{id}','CategoriesController@update');
Route::delete('/categories/{id}', 'CategoriesController@destroy');

Route::get('/room_capacities', 'RoomCapacitiesController@index');
Route::get('/room_capacities/{id}', 'RoomCapacitiesController@show');
Route::post('/room_capacities', 'RoomCapacitiesController@store');
Route::patch('/room_capacities/{id}', 'RoomCapacitiesController@update');
Route::delete('/room_capacities/{id}', 'RoomCapacitiesController@destroy');

Route::get('/photos', 'PhotosController@index');
Route::get('/photos/{id}', 'PhotosController@show');
Route::post('/photos', 'PhotosController@store');
Route::delete('/photos/{id}', 'PhotosController@destroy');

Route::get('/amenities', 'AmenitiesController@index');
Route::get('/amenities/{id}', 'AmenitiesController@show');
Route::post('/amenities', 'AmenitiesController@store');
Route::delete('/amenities/{id}', 'AmenitiesController@destroy');

Route::get('/amenity_items', 'AmenityItemsController@index');
Route::get('/amenity_items/{id}', 'AmenityItemsController@show');
Route::post('/amenity_items', 'AmenityItemsController@store');
Route::patch('/amenity_items/{id}', 'AmenityItemsController@update');
Route::delete('/amenity_items/{id}', 'AmenityItemsController@destroy');

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/{id}', 'OrdersController@show');
Route::post('/orders', 'OrdersController@store');
Route::delete('/orders/{id}', 'OrdersController@destroy');

Route::get('/order_details', 'OrderDetailsController@index');
Route::get('/order_details/{id}', 'OrderDetailsController@show');
Route::post('/order_details', 'OrderDetailsController@store');
Route::delete('/order_details/{id}', 'OrderDetailsController@destroy');