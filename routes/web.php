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

/**
 * Available to the public; no need to authenticate
 */

Route::get('/', function () {
    return view('layouts.welcome');
});

Route::get('/rooms', function () {
    $rooms = TypeRoom::all();

    return view('guest.room', compact('rooms'));
});

Route::get('/facilities', function () {
    $facilities = Facility::all();

    return view('guest.facility', compact('facilities'));
});

Route::get('/reserve', function () {
    return view('guest.reserve');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->name('admin.')->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('analytic');
        Route::resource('type_room', App\Http\Controllers\TypeRoomController::class);
        Route::resource('room', App\Http\Controllers\RoomController::class)->except(['show']);
        Route::resource('facility', App\Http\Controllers\FacilityController::class);
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', function () {
                return redirect()->route('admin.gallery.type_room.index');
            })->name('index');
            Route::resource('type_room', App\Http\Controllers\GalleryTypeRoomController::class)->only(['index', 'update', 'destroy']);
            Route::resource('facility', App\Http\Controllers\GalleryFacilityController::class)->only(['index', 'update', 'destroy']);;
        });
    });
});

Auth::routes();

