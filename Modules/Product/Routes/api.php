<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\APIController;
use Modules\Product\Http\Controllers\ProductReviewController;
use Modules\Product\Http\Controllers\ProductFavouriteController;

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


Route::group(['as' => 'api.'], function () {
    Route::prefix('/{lang}')->group(function () {
        Route::any('product/{id}', [APIController::class, 'show']);
        Route::any('products', [APIController::class, 'index']);
        
        Route::apiResource('product-review', ProductReviewController::class);
        Route::apiResource('product-favourite', ProductFavouriteController::class);
    
    });
});
