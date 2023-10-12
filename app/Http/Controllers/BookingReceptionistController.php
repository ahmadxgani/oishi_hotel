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
     * Update the specified resource in storage.
     */
    public function verify(Booking $booking_receptionist)
    {
        $booking_receptionist->update(['status' => 'verified']);
        $booking_receptionist->booking_items()->update(['date_checkin' => now()]);
        toast('Successfully verify invoice', 'success');
        return redirect()->route('booking_receptionist.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function complete(Booking $booking_receptionist)
    {
        $booking_receptionist->update(['status' => 'completed']);
        $booking_receptionist->booking_items()->update(['date_checkout' => now()]);
        toast('Successfully checkout', 'success');
        return redirect()->route('booking_receptionist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking_receptionist)
    {
        return view('receptionist.detail', compact('booking_receptionist'));
    }
}
