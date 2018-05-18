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

Route::group(['middleware' => 'cors'], function() {
    Route::get('/admins', 'AdminController@index')->middleware('auth:admin');
    Route::post('/admins/login', 'AdminController@login');
    
    Route::get('/users/', 'UserController@index')->middleware('auth:user');
    Route::get('/me', 'UserController@show')->middleware('auth:user');
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::post('/user','UserController@update')->middleware('auth:user');
    Route::delete('/user/kill','UserController@destroy')->middleware('auth:user');
    
    Route::get('/favorites', 'FavoritesController@index')->middleware('auth:admin');
    Route::get('/favorite', 'FavoritesController@show')->middleware('auth:user');
    Route::post('/favorites', 'FavoritesController@store')->middleware('auth:user');
    Route::delete('/favorites/{favorite}', 'FavoritesController@destroy')->middleware('auth:user');
    
    Route::get('/rooms/', 'RoomsController@index');
    Route::get('/rooms/{id}', 'RoomsController@show');
    Route::post('/rooms', 'RoomsController@store')->middleware('auth:user');
    Route::patch('/rooms/{room}', 'RoomsController@update')->middleware('auth:user');
    Route::delete('/rooms/{room}', 'RoomsController@destroy')->middleware('auth:user');

    Route::get('/categories','CategoriesController@index')->middleware('auth:admin');
    Route::get('/categories/{id}','CategoriesController@show')->middleware('auth:admin');
    Route::post('/categories','CategoriesController@store')->middleware('auth:user');
    Route::patch('/categories/{category}','CategoriesController@update')->middleware('auth:admin');
    Route::delete('/categories/{category}', 'CategoriesController@destroy')->middleware('auth:admin');

    Route::get('/room_capacities', 'RoomCapacitiesController@index')->middleware('auth:admin');
    Route::get('/room_capacities/{id}', 'RoomCapacitiesController@show');
    Route::post('/room_capacities', 'RoomCapacitiesController@store')->middleware('auth:user');
    Route::patch('/room_capacities/{room_capacity}', 'RoomCapacitiesController@update')->middleware('auth:user');
    Route::delete('/room_capacities/{room_capacity}', 'RoomCapacitiesController@destroy')->middleware('auth:user');

    Route::get('/photos', 'PhotosController@index')->middleware('auth:admin');
    Route::get('/photos/{id}', 'PhotosController@show');
    Route::post('/photos', 'PhotosController@store')->middleware('auth:user');
    Route::delete('/photos/{photo}', 'PhotosController@destroy')->middleware('auth:user');

    Route::get('/amenities', 'AmenitiesController@index')->middleware('auth:admin');
    Route::get('/amenities/{id}', 'AmenitiesController@show')->middleware('auth:admin');
    Route::post('/amenities', 'AmenitiesController@store')->middleware('auth:user');
    Route::delete('/amenities/{amenity}', 'AmenitiesController@destroy')->middleware('auth:admin');

    Route::get('/amenity_items', 'AmenityItemsController@index')->middleware('auth:admin');
    Route::get('/amenity_items/{id}', 'AmenityItemsController@show')->middleware('auth:admin');
    Route::post('/amenity_items', 'AmenityItemsController@store')->middleware('auth:user');
    Route::patch('/amenity_items/{amenity_item}', 'AmenityItemsController@update')->middleware('auth:admin');
    Route::delete('/amenity_items/{amenity_item}', 'AmenityItemsController@destroy')->middleware('auth:admin');

    Route::get('/orders', 'OrdersController@index')->middleware('auth:admin');
    Route::get('/orders/{id}', 'OrdersController@show')->middleware('auth:user');
    Route::post('/orders', 'OrdersController@store')->middleware('auth:user');
    Route::delete('/orders/{order}', 'OrdersController@destroy')->middleware('auth:api','user');

    Route::get('/order_details', 'OrderDetailsController@index')->middleware('auth:admin');
    Route::get('/order_details/{id}', 'OrderDetailsController@show')->middleware('auth:user');
    Route::post('/order_details', 'OrderDetailsController@store')->middleware('auth:user');
    Route::delete('/order_details/{order_detail}', 'OrderDetailsController@destroy')->middleware('auth:user');
});