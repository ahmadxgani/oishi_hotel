<?php

use App\Models\Facility;
use App\Models\RoomType;
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
    $rooms = RoomType::all();

    return view('guest.room', compact('rooms'));
});

Route::get('/facilities', function () {
    $facilities = Facility::all();

    return view('guest.facility', compact('facilities'));
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('receptionist/booking_list', function () {
        return view('receptionist.booking_list');
    })->middleware('can:isReceptionist')->name('receptionist.booking_list');

    Route::get('guest/reserve', function () {
        return view('guest.reserve');
    })->middleware('can:isGuest')->name('guest.reserve');

    Route::prefix('admin')->middleware('can:isAdmin')->name('admin.')->group(function () {
        Route::get('/', [App\Http\Controllers\AnalyticController::class, 'index'])->name('analytic');
        Route::resource('type_room', App\Http\Controllers\RoomTypeController::class);
        Route::resource('room', App\Http\Controllers\RoomController::class)->except(['show']);
        Route::resource('facility', App\Http\Controllers\FacilityController::class);
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', function () {
                return redirect()->route('admin.gallery.type_room.index');
            })->name('index');
            Route::resource('type_room', App\Http\Controllers\GalleryRoomTypeController::class)->only(['index', 'update', 'destroy']);
            Route::resource('facility', App\Http\Controllers\GalleryFacilityController::class)->only(['index', 'update', 'destroy']);;
        });
    });
});

Auth::routes();

