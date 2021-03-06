<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    return view('backend.auth.login');
});

Route::get('/', function () {
    $users = \App\Models\Accounts\User::query()->first();
    //$users = new \App\Models\Accounts\User();
    dd($users->hasPermission('get.user1'));
    return view('welcome');
});

Route::get('/clear-cache', function() {
    $exitCode = \Illuminate\Support\Facades\Artisan::call('cache:clear');
    // return what you want
});
