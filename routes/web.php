<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
});
Route::resource('/transactions', 'App\Http\Controllers\TransactionsController'::class);
Route::resource('/location', 'App\Http\Controllers\LocationController'::class);
Route::resource('/vehicletype', 'App\Http\Controllers\VehicletypeController'::class);