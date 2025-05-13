<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('states', \App\Http\Controllers\StateController::class)->middleware('auth:sanctum');
Route::apiResource('cities', \App\Http\Controllers\CityController::class)->middleware('auth:sanctum');;
Route::apiResource('clusters', \App\Http\Controllers\ClusterController::class)->middleware('auth:sanctum');;
Route::apiResource('campaigns', \App\Http\Controllers\CampaignController::class)->middleware('auth:sanctum');;
Route::apiResource('discounts', \App\Http\Controllers\DiscountController::class)->middleware('auth:sanctum');;
Route::apiResource('products', \App\Http\Controllers\ProductController::class)->middleware('auth:sanctum');;

Route::prefix('campaigns/{campaign}/products')->group(function () {
    Route::get('/', [\App\Http\Controllers\CampaignProductController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\CampaignProductController::class, 'store']);
    Route::delete('/{product}', [\App\Http\Controllers\CampaignProductController::class, 'destroy']);
})->middleware('auth:sanctum');;
