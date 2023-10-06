<?php

namespace App\Http\Controllers;

use App\Models\TypeRoom;
use App\Http\Requests\StoreTypeRoomRequest;
use App\Http\Requests\UpdateTypeRoomRequest;

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
    public function store(StoreTypeRoomRequest $request)
    {
        TypeRoom::create([
            'name' => $request->name,
            'description' => $request->description,
            'publish_rate' => $request->publish_rate,
        ]);

        redirect()->route('admin.room.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRoomRequest $request, TypeRoom $room)
    {
        //
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
