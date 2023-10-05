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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeRoom $typeRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeRoom $typeRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRoomRequest $request, TypeRoom $typeRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeRoom $typeRoom)
    {
        //
    }
}
