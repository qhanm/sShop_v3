<?php

use Illuminate\Support\Facades\Route;

Route::prefix('backend')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::get('/', 'AuthController@index')->name('backend.auth.login');
        Route::post('/', 'AuthController@checkLogin')->name('backend.auth.checkLogin');
    });

    Route::middleware(['backend.authenticate'])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', 'DashboardController@index')->name('backend.dashboard.index');
        });

        Route::prefix('accounts')->group(function () {
            Route::get('/users', 'UserController@index')->name('backend.users.index');
        });
    });



});
