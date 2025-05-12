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
Route::apiResource('discounts', \App\Http\Controllers\DiscountController::class);
Route::apiResource('products', \App\Http\Controllers\ProductController::class);

Route::prefix('campaigns/{campaign}/products')->group(function () {
    Route::get('/', [\App\Http\Controllers\CampaignProductController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\CampaignProductController::class, 'store']);
    Route::delete('/{product}', [\App\Http\Controllers\CampaignProductController::class, 'destroy']);
});
