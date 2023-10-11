<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\RoomType;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET["search_item"]) && is_string($_GET["search_item"])) {
            $rooms = Room::search($_GET["search_item"])->paginate(15)->withQueryString();
        } else {
            $rooms = Room::paginate(15);
        }

        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_rooms = RoomType::all();
        return view('admin.room.create', compact('type_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $r)
    {
        Room::create([
            'no_room'           => $r->no_room,
            'room_type_id'      => $r->type_room,
        ]);

        toast('Successfully added a new room', 'success');
        return redirect()->route('admin.room.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $type_rooms = RoomType::all();
        return view('admin.room.edit', compact('room', 'type_rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $r, Room $room)
    {
        $room->update([
            'publish_rate'      => $r->publish_rate,
            'type'              => $r->type,
        ]);

        toast('Room successfully updated', 'success');
        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        toast('Room successfully deleted', 'success');
        return redirect()->route('admin.room.index');
    }
}
