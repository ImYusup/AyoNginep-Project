<?php

Route::get('/', function () {
    return view('welcome');
});


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::post('/register', 'Auth\RegisterController@register');
