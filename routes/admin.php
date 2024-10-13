<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ClientStoryController;
use App\Http\Controllers\Admin\EmployeeServiceController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ForgetController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SliderClientController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\ValueController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [Localization::class]], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::POST('login', [LoginController::class, 'login']);
    Route::get('forget', [ForgetController::class, 'index'])->name('forget');
    Route::POST('forget', [ForgetController::class, 'forget'])->name('forget');
    Route::get('code/{uuid}', [ForgetController::class, 'code'])->name('code');
    Route::POST('resend', [ForgetController::class, 'resend'])->name('resend');
    Route::POST('verify', [ForgetController::class, 'verify'])->name('verify');
    Route::get('reset/{uuid}', [ForgetController::class, 'reset'])->name('reset');
    Route::POST('update-password/{uuid}', [ForgetController::class, 'update'])->name('update-password');

    Route::group(['middleware' => ['auth:admin']], function () {
        // Auth
        Route::any('/', [HomeController::class, 'home'])->name('home');
        Route::any('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::POST('logout', [LoginController::class, 'logout'])->name('logout');

        // Setting
        Route::GET('/settings/{type?}', [SettingController::class, 'show'])->name('settings.index');
        Route::PUT('/settings/{type?}', [SettingController::class, 'update'])->name('settings.update');

        // Modules
        Route::resources(['modules' => ModuleController::class]);

        // Supports
        Route::resources(['supports' => SupportController::class]);

        // Statistics
        Route::resources(['statistics' => StatisticsController::class]);

        // SliderClient
        Route::resources(['sliderClients' => SliderClientController::class]);

        //FAQ
        Route::resources(['faq' => FaqController::class]);

        // Branches
        Route::resources(['branches' => BranchController::class]);

        // Employee Service
        Route::resources(['employeeServices' => EmployeeServiceController::class]);

        // Plans
        Route::resources(['plans' => PlanController::class]);
        Route::PUT('update_plans/index', [PlanController::class,'update_plans_index'])->name('update_plans_index');

        // Features
        Route::resources(['features' => FeatureController::class]);

        // Values
        Route::resources(['values' => ValueController::class]);
        Route::PUT('update_values/index', [ValueController::class,'update_values_index'])->name('update_values_index');

        // Videos
        Route::resources(['videos' => VideoController::class]);
        Route::get('update-video/updateMostPopular/{id}', [VideoController::class,'update_most_popular'])->name('video.updateMostPopular');

        // ClientStories
        Route::resources(['clientStories' => ClientStoryController::class]);

        // skills
        Route::resources(['skills' => SkillController::class]);

        // Jobs
        Route::resources(['jobs' => JobController::class]);

        // Posts
        Route::resources(['posts' => PostController::class]);
        Route::get('update-post/updateMostPopular/{id}', [PostController::class,'update_most_popular'])->name('post.updateMostPopular');
        Route::post('update-post/updateShowInTop', [PostController::class,'updateShowInTop'])->name('post.updateShowInTop');
        Route::post('update-post/updateShowInHead', [PostController::class,'updateShowInHead'])->name('post.updateShowInHead');

        // Publishers
        Route::resources(['publishers' => PublisherController::class]);


    });
});