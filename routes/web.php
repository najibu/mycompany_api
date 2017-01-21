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

// Acommodations
Route::get('/accommodations/create', 'AccommodationsController@create');
Route::post('/accommodations/create', 'AccommodationsController@store');
Route::get('/accommodations/{id?}', 'AccommodationsController@show');