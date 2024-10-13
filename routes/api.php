<?php

use App\Functions\WhatsApp;
use App\Mail\SendOTP;
use Illuminate\Http\Request;
use App\Functions\ResponseHelper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;

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

    Route::any('send-otp/whatsapp/{phone?}', function ($lang) {
        $phone = request('phone');
        $otp = WhatsApp::SendOTP($phone);
        return ResponseHelper::make($otp);
    });
    Route::any('send-otp/email/{email?}', function ($lang) {
        $email = request('email');
        $otp = rand(100000, 999999);
        Mail::to($email)->send(new SendOTP($otp));
        return ResponseHelper::make($otp);
    });
});


Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});