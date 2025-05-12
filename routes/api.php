<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('states', \App\Http\Controllers\StateController::class);
Route::apiResource('cities', \App\Http\Controllers\CityController::class);
Route::apiResource('clusters', \App\Http\Controllers\ClusterController::class);
Route::apiResource('campaigns', \App\Http\Controllers\CampaignController::class);
