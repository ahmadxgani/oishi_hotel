<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\RoomPhoto;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET["search_item"]) && is_string($_GET["search_item"])) {
            $rooms = RoomType::search($_GET["search_item"])->paginate(15)->withQueryString();
        } else {
            $rooms = RoomType::paginate(15);
        }

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
    public function store(StoreRoomTypeRequest $r)
    {
        $room = RoomType::create([
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
    public function show(RoomType $type_room)
    {
        return view('admin.type_room.detail', compact('type_room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $type_room)
    {
        return view('admin.type_room.edit', compact('type_room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $r, RoomType $type_room)
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
    public function destroy(RoomType $type_room)
    {
        $type_room->delete();

        toast('Type Room successfully deleted', 'success');
        return redirect()->route('admin.type_room.index');
    }
}
