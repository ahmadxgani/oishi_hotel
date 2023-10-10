<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\TypeRoom;
use App\Trait\SearchItem;

class RoomController extends Controller
{
    /** dunno if this is the correct way or 'best practice' XD */
    use SearchItem;
    protected $model = Room::class;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // todo: add support for name instead of querying the ID if the column is a foreign ID.
        $this->model = $this->search(['type_room_id']);
        $rooms = $this->model->paginate(15);

        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_rooms = TypeRoom::all();
        return view('admin.room.create', compact('type_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $r)
    {
        Room::create([
            'no_room'           => $r->no_room,
            'type_room_id'      => $r->type_room,
        ]);

        toast('Successfully added a new room', 'success');
        return redirect()->route('admin.room.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $type_rooms = TypeRoom::all();
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
