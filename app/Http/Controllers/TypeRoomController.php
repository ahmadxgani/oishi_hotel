<?php

namespace App\Http\Controllers;

use App\Models\TypeRoom;
use App\Http\Requests\StoreTypeRoomRequest;
use App\Http\Requests\UpdateTypeRoomRequest;
use App\Models\RoomPhoto;

class TypeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = TypeRoom::all();

        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRoomRequest $r)
    {
        $room = TypeRoom::create([
            'name'          => $r->name,
            'publish_rate'  => $r->publish_rate,
            'description'   => $r->description,
        ]);

        foreach ($r->file('photos') as $file) {
            $path = $file->store('public/types_of_room');
            RoomPhoto::create([
                'type_room_id' => $room->id,
                'image'    => $path
            ]);
        }

        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeRoom $room)
    {
        return view('admin.room.detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeRoom $room)
    {
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRoomRequest $r, TypeRoom $room)
    {
        $room->update([
            'publish_rate'  => $r->publish_rate,
            'description'   => $r->description,
            'name'          => $r->name,
        ]);

        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeRoom $room)
    {
        $room->delete();

        return redirect()->route('admin.room.index');
    }
}
