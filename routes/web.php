<?php

use App\Models\Facility;
use App\Models\TypeRoom;
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
    return view('layouts.welcome');
});

Route::get('/reserve', function () {
    return view('guest.reserve');
});

Route::get('/rooms', function () {
    $rooms = TypeRoom::all();

    return view('guest.room', compact('rooms'));
});

Route::get('/facilities', function () {
    $facilities = Facility::all();

    return view('guest.facility', compact('facilities'));
});

Route::get('/receptionist', function () {
    return view('facility');
});

Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('analytic');
    Route::resource('room', App\Http\Controllers\TypeRoomController::class);
    Route::resource('facility', App\Http\Controllers\FacilityController::class);
});

Auth::routes();

