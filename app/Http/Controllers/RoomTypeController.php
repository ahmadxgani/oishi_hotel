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

        return view('admin.room_type.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room_type.create');
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
                'room_type_id' => $room->id,
                'image'    => $path
            ]);
        }

        toast('Type Room successfully added to the record', 'success');
        return redirect()->route('admin.room_type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $room_type)
    {
        return view('admin.room_type.detail', compact('room_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $room_type)
    {
        return view('admin.room_type.edit', compact('room_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $r, RoomType $room_type)
    {
        $room_type->update([
            'publish_rate'  => $r->publish_rate,
            'description'   => $r->description,
            'name'          => $r->name,
        ]);

        toast('Type Room successfully updated', 'success');
        return redirect()->route('admin.room_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $room_type)
    {
        $room_type->delete();

        toast('Type Room successfully deleted', 'success');
        return redirect()->route('admin.room_type.index');
    }
}
