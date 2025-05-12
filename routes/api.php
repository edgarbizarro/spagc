<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('states', \App\Http\Controllers\StateController::class);
Route::apiResource('cities', \App\Http\Controllers\CityController::class);
