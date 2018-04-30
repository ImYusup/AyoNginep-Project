<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', 'RoomsController@index');

// Route::get('/rooms/create', 'RoomsController@create');

Route::get('/rooms/{id}', 'RoomsController@show');

Route::post('/rooms', 'RoomsController@store');

Route::patch('/rooms/{id}', 'RoomsController@update');