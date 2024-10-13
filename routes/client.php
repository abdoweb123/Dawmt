<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\ForceSSL;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'client.', 'middleware' => [Localization::class, ForceSSL::class]], function ()
{
    Route::any('/', [HomeController::class, 'home'])->name('home');

    Route::POST('/contactUs', [HomeController::class, 'contact'])->name('contactUs');
    Route::POST('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
    Route::get('sidePages/{type}', [HomeController::class, 'sidePages'])->name('sidePages');
    Route::get('FAQ', [HomeController::class, 'faq'])->name('faq');
    Route::get('contact-us', [HomeController::class, 'contactUsPage'])->name('contactUsPage');
    Route::get('ess-application', [HomeController::class, 'ess_application'])->name('ess_application');
    Route::get('plans', [HomeController::class, 'plans'])->name('plans');
    Route::get('values', [HomeController::class, 'values'])->name('values');
    Route::get('videos', [HomeController::class, 'videos'])->name('videos');
    Route::get('client-stories', [HomeController::class, 'clientStories'])->name('clientStories');
    Route::get('jobs', [HomeController::class, 'jobs'])->name('jobs');
    Route::get('job-details/{id}/{name?}', [HomeController::class, 'jobDetails'])->name('jobDetails');
    Route::get('blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('blog/{id}/{post_name?}', [HomeController::class, 'post_details'])->name('post_details');




});