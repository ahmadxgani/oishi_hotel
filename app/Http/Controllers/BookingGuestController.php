<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Room;
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

        if (isset($_GET["search_item"]) && is_string($_GET["search_item"])) {
            $bookings = Booking::where('user_id', Auth::user()->id)->search($_GET["search_item"])->paginate(15)->withQueryString();
        } else {
            $bookings = Booking::where('user_id', Auth::user()->id)->paginate(15);
        }

        return view('guest.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = RoomType::all();
        return view('guest.reserve', compact('rooms'));
    }

    private function store_booking($r)
    {
        $price = RoomType::getPrice($r->room_type);
        if (!$price) {
            throw new \Exception("Failed to get the room price");
        }

        $avail_rooms = Room::getAvailableRooms($r->room_type, $r->date_book_start, $r->date_book_end, $r->nr_rooms);
        if ($avail_rooms < $r->nr_rooms) {
            throw new \Exception("No available rooms for your booking");
        }

        $nr_days = (strtotime($r->date_book_end) - strtotime($r->date_book_start)) / (3600 * 24);
        $book = Booking::create([
            "user_id"         => Auth::user()->id,
            "date_book_end"   => $r->date_book_end,
            "date_book_start" => $r->date_book_start,
            "nr_adults"       => $r->nr_adults,
            "nr_rooms"        => $r->nr_rooms,
            "nr_children"     => $r->nr_children,
            "total_price"     => $price * $r->nr_rooms * $nr_days,
        ]);

        $data = [];
        for ($i = 0; $i < $r->nr_rooms; $i++) {
            $data[] = [
                "booking_id" => $book->id,
                "room_id"    => $avail_rooms[$i]->id,
                "price"      => $price
            ];
        }

        BookingItem::insert($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $r)
    {
        try {
            DB::beginTransaction();
            $this->store_booking($r);
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
        return view('guest.detail');
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
