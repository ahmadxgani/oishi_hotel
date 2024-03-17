<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', function () {
    return view('room');
});

Route::get('/facilities', function () {
    return view('facility');
});

Route::get('/receptionist', function () {
    return view('facility');
});

Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('analytic');
    Route::resource('room', App\Http\Controllers\RoomController::class);
    Route::resource('facility', App\Http\Controllers\FacilityController::class);
});

Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
