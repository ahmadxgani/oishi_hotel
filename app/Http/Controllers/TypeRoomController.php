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

        return view('admin.type_room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type_room.create');
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

        toast('Type Room successfully added to the record', 'success');
        return redirect()->route('admin.type_room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeRoom $type_room)
    {
        return view('admin.type_room.detail', compact('type_room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeRoom $type_room)
    {
        return view('admin.type_room.edit', compact('type_room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRoomRequest $r, TypeRoom $type_room)
    {
        $type_room->update([
            'publish_rate'  => $r->publish_rate,
            'description'   => $r->description,
            'name'          => $r->name,
        ]);

        toast('Type Room successfully updated', 'success');
        return redirect()->route('admin.type_room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeRoom $type_room)
    {
        $type_room->delete();

        toast('Type Room successfully deleted', 'success');
        return redirect()->route('admin.type_room.index');
    }
}
