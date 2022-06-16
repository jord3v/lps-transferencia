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


Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('/landing-pages', 'LandingPageController');

    //Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    //Route::post('/settings', [App\Http\Controllers\SettingController::class, 'settingsUpdate'])->name('settings.update');
    Route::resource('/settings', 'SettingController');

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
});