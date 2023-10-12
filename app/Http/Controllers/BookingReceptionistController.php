<?php

namespace App\Http\Controllers;

use App\Models\Booking;

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
}
