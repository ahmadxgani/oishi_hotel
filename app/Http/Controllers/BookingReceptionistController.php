<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\UpdateBookingRequest;

class BookingReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET["search_item"]) && is_string($_GET["search_item"])) {
            $bookings = Booking::searchReceptionist($_GET["search_item"])->paginate(15)->withQueryString();
        } else {
            $bookings = Booking::paginate(15);
        }

        return view('receptionist.booking_list', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking_receptionist)
    {
        return view('receptionist.detail', compact('booking_receptionist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
