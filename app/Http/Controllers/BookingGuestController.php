<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\RoomType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = RoomType::all();
        return view('guest.reserve', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        try {
            DB::beginTransaction();

            $book = Booking::create([
                "user_id"         => Auth::user()->id,
                "date_book_end"   => $r->date_book_end,
                "date_book_start" => $r->date_book_start,
                "nr_adults"       => $r->nr_adults,
                "nr_children"     => $r->nr_children,
                "total_price"     => 55,
            ]);

            for ($i = 1; $i <= $r->nr_rooms; $i++) {
                BookingItem::create([
                    "booking_id" => $book->id,
                    "room_id"    => 1, // TODO(): auto chosen by backend
                    "price"      => 1,
                ]);
            }

            DB::commit();
            toast('Successfully created a new booking', 'success');
            return redirect()->route('booking_guest.index');
        } catch (Exception $e) {
            DB::rollBack();
            toast($e->getMessage(), 'error');
            return redirect()->route('booking_guest.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
