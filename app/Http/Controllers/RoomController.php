<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\RoomPhoto;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create');
    }

    const ALLOWED_PHOTO_EXT  = ["jpg", "jpeg", "png", "bmp", "webp"];
    const ALLOWED_MIME_TYPES = [
        "image/jpeg",
        "image/png",
    ];
    const ALLOWED_MAX_SIZE = 1024*1024*5;

    private function store_room(StoreRoomRequest $r)
    {
        $room = Room::create([
            'no_room'           => $r->no_room,
            'publish_rate'      => $r->publish_rate,
            'type'              => $r->type,
        ]);

        foreach ($r->photos as $photo) {
            $orig = $photo->getClientOriginalName();
            $hash = sha1_file($photo->getPathname());

            $ext = explode(".", $orig);
            $ext = end($ext);
            $ext = strtolower($ext);
            if (!in_array($ext, self::ALLOWED_PHOTO_EXT)) {
                throw new Exception("Invalid photo extension {$ext} from file {$orig}");
            }

            $mimeType = $photo->getMimeType();
            if (!in_array($mimeType, self::ALLOWED_MIME_TYPES)) {
                throw new Exception("Invalid photo mime type {$mimeType} from file {$orig}");
            }

            $fsize = $photo->getSize();
            if ($fsize > self::ALLOWED_MAX_SIZE) {
                throw new Exception("File {$orig} is too big (max allowed size is ".self::ALLOWED_MAX_SIZE." bytes, given {$fsize})");
            }

            $fname = "{$hash}.{$ext}";
            Storage::disk('local')->put($fname, $photo);
            RoomPhoto::create([
                'room_id' => $room->id,
                'path'    => $fname
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $r)
    {
        try {
            DB::beginTransaction();
            $this->store_room($r);
            DB::commit();
            return redirect()->route('admin.room.index')
                    ->with("success", "Successfully added a new room");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.room.index')->with("errors", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.room.edit', compact('room'));
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

        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.room.index');
    }
}
