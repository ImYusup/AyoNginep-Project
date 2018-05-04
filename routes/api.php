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

Route::get('/users', 'UserController@index'); //->middleware('auth:api');
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/userdetails', 'UserController@getDetails');
});

Route::get('/favorites', 'FavoritesController@index');
Route::get('/favorites/{favorite}', 'FavoritesController@show');
Route::post('/favorites', 'FavoritesController@store');
Route::delete('/favorites/{favorite}', 'FavoritesController@destroy');

Route::group(['middleware' => 'cors'], function() {
    Route::get('/users', 'UserController@index');
    Route::get('/users/{user}', 'UserController@show');
    Route::post('/users','UserController@store');
    Route::patch('/users/{user}','UserController@update');
    Route::delete('/users/{user}','UserController@destroy');
    
    Route::get('/favorites', 'FavoritesController@index');
    Route::get('/favorites/{favorite}', 'FavoritesController@show');
    Route::post('/favorites', 'FavoritesController@store');
    Route::delete('/favorites/{favorite}', 'FavoritesController@destroy');

    Route::get('/rooms', 'RoomsController@index');
    Route::get('/rooms/{id}', 'RoomsController@show');
    Route::post('/rooms', 'RoomsController@store');
    Route::patch('/rooms/{room}', 'RoomsController@update');
    Route::delete('/rooms/{room}', 'RoomsController@destroy');

    Route::get('/categories','CategoriesController@index');
    Route::get('/categories/{id}','CategoriesController@show');
    Route::post('/categories','CategoriesController@store');
    Route::patch('/categories/{category}','CategoriesController@update');
    Route::delete('/categories/{category}', 'CategoriesController@destroy');

    Route::get('/room_capacities', 'RoomCapacitiesController@index');
    Route::get('/room_capacities/{id}', 'RoomCapacitiesController@show');
    Route::post('/room_capacities', 'RoomCapacitiesController@store');
    Route::patch('/room_capacities/{room_capacity}', 'RoomCapacitiesController@update');
    Route::delete('/room_capacities/{room_capacity}', 'RoomCapacitiesController@destroy');

    Route::get('/photos', 'PhotosController@index');
    Route::get('/photos/{id}', 'PhotosController@show');
    Route::post('/photos', 'PhotosController@store');
    Route::delete('/photos/{photo}', 'PhotosController@destroy');

    Route::get('/amenities', 'AmenitiesController@index');
    Route::get('/amenities/{id}', 'AmenitiesController@show');
    Route::post('/amenities', 'AmenitiesController@store');
    Route::delete('/amenities/{amenity}', 'AmenitiesController@destroy');

    Route::get('/amenity_items', 'AmenityItemsController@index');
    Route::get('/amenity_items/{id}', 'AmenityItemsController@show');
    Route::post('/amenity_items', 'AmenityItemsController@store');
    //Route::patch('/amenity_items/{amenity_item}', 'AmenityItemsController@update');
    Route::delete('/amenity_items/{amenity_item}', 'AmenityItemsController@destroy');

    Route::get('/orders', 'OrdersController@index');
    Route::get('/orders/{id}', 'OrdersController@show');
    Route::post('/orders', 'OrdersController@store');
    Route::delete('/orders/{order}', 'OrdersController@destroy');

    Route::get('/order_details', 'OrderDetailsController@index');
    Route::get('/order_details/{id}', 'OrderDetailsController@show');
    Route::post('/order_details', 'OrderDetailsController@store');
    Route::delete('/order_details/{order_detail}', 'OrderDetailsController@destroy');
});