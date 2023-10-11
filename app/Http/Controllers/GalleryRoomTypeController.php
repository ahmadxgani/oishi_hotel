<?php

namespace App\Http\Controllers;

use App\Models\RoomPhoto;
use App\Models\RoomType;
use App\Trait\GalleryPhoto;
use Illuminate\Http\Request;

class GalleryRoomTypeController extends Controller
{
    use GalleryPhoto;
    protected $model = RoomPhoto::class;
    protected $type_photo = RoomType::class;

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomPhoto $type_room)
    {
        // todo: validate the request XD
        $type_room->update([
            'facility_id' => $request->linked_id
        ]);

        toast('Photo successfully updated', 'success');
        return back();
    }
}
