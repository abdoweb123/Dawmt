<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Country\Http\Controllers\APIController;

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

Route::prefix('/{lang}')->group(function () {
    Route::any('countries', [APIController::class, 'countries']);
    Route::any('regions', [APIController::class, 'regions']);
    Route::any('cities', [APIController::class, 'cities']);
});