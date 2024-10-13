<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::view('products/sort', 'product::sort')->name('products.sort');
        Route::POST('products/sort', [WebController::class, 'sort'])->name('products.sort');
        Route::resource('products', WebController::class);
        
    });
});
