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
Route::post('/register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/userdetails', 'UserController@getDetails');
});

Route::group(['middleware' => 'cors'], function() {
    Route::get('/admins', 'AdminController@index');//->middleware('auth:api', 'admin');
    Route::post('/admins/login', 'AdminController@login');

    Route::get('/users', 'UserController@index')->middleware('auth:api', 'admin');
    Route::get('/users/{user}', 'UserController@show')->middleware('auth:api', 'user');
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::patch('/users/{user}','UserController@update')->middleware('auth:api', 'user');
    Route::delete('/users/{user}','UserController@destroy')->middleware('auth:api', 'user');

    Route::get('/favorites', 'FavoritesController@index')->middleware('auth:api', 'admin');
    Route::get('/favorites/{favorite}', 'FavoritesController@show')->middleware('auth:api', 'admin');
    Route::post('/favorites', 'FavoritesController@store')->middleware('auth:api', 'user');
    Route::delete('/favorites/{favorite}', 'FavoritesController@destroy')->middleware('auth:api', 'user');

    Route::get('/rooms', 'RoomsController@index');
    Route::get('/rooms/{id}', 'RoomsController@show');
    Route::post('/rooms', 'RoomsController@store')->middleware('auth:api', 'user');
    Route::patch('/rooms/{room}', 'RoomsController@update')->middleware('auth:api', 'user');
    Route::delete('/rooms/{room}', 'RoomsController@destroy')->middleware('auth:api', 'user');

    Route::get('/categories','CategoriesController@index')->middleware('auth:api', 'admin');
    Route::get('/categories/{id}','CategoriesController@show')->middleware('auth:api', 'admin');
    Route::post('/categories','CategoriesController@store')->middleware('auth:api', 'user');
    Route::patch('/categories/{category}','CategoriesController@update')->middleware('auth:api', 'admin');
    Route::delete('/categories/{category}', 'CategoriesController@destroy')->middleware('auth:api', 'admin');

    Route::get('/room_capacities', 'RoomCapacitiesController@index')->middleware('auth:api', 'admin');
    Route::get('/room_capacities/{id}', 'RoomCapacitiesController@show');
    Route::post('/room_capacities', 'RoomCapacitiesController@store')->middleware('auth:api', 'user');
    Route::patch('/room_capacities/{room_capacity}', 'RoomCapacitiesController@update')->middleware('auth:api', 'user');
    Route::delete('/room_capacities/{room_capacity}', 'RoomCapacitiesController@destroy')->middleware('auth:api', 'user');

    Route::get('/photos', 'PhotosController@index')->middleware('auth:api', 'admin');
    Route::get('/photos/{id}', 'PhotosController@show');
    Route::post('/photos', 'PhotosController@store')->middleware('auth:api', 'user');
    Route::delete('/photos/{photo}', 'PhotosController@destroy')->middleware('auth:api', 'user');

    Route::get('/amenities', 'AmenitiesController@index')->middleware('auth:api', 'admin');
    Route::get('/amenities/{id}', 'AmenitiesController@show')->middleware('auth:api', 'admin');
    Route::post('/amenities', 'AmenitiesController@store')->middleware('auth:api', 'user');
    Route::delete('/amenities/{amenity}', 'AmenitiesController@destroy')->middleware('auth:api', 'admin');

    
    //Route::patch('/amenity_items/{amenity_item}', 'AmenityItemsController@update');
    Route::delete('/amenity_items/{amenity_item}', 'AmenityItemsController@destroy');
    Route::get('/amenity_items', 'AmenityItemsController@index')->middleware('auth:api', 'admin');
    Route::get('/amenity_items/{id}', 'AmenityItemsController@show')->middleware('auth:api', 'admin');
    Route::post('/amenity_items', 'AmenityItemsController@store')->middleware('auth:api', 'user');
    Route::patch('/amenity_items/{amenity_item}', 'AmenityItemsController@update')->middleware('auth:api', 'admin');
    Route::delete('/amenity_items/{amenity_item}', 'AmenityItemsController@destroy')->middleware('auth:api', 'admin');

    Route::get('/orders', 'OrdersController@index')->middleware('auth:api', 'admin');
    Route::get('/orders/{id}', 'OrdersController@show')->middleware('auth:api', 'user');
    Route::post('/orders', 'OrdersController@store')->middleware('auth:api', 'user');
    Route::delete('/orders/{order}', 'OrdersController@destroy')->middleware('auth:api','user');

    Route::get('/order_details', 'OrderDetailsController@index')->middleware('auth:api', 'admin');
    Route::get('/order_details/{id}', 'OrderDetailsController@show')->middleware('auth:api', 'user');
    Route::post('/order_details', 'OrderDetailsController@store')->middleware('auth:api', 'user');
    Route::delete('/order_details/{order_detail}', 'OrderDetailsController@destroy')->middleware('auth:api','user');
});