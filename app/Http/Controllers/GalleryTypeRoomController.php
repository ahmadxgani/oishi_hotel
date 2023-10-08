<?php

namespace App\Http\Controllers;

use App\Models\RoomPhoto;
use App\Trait\GalleryPhoto;

class GalleryTypeRoomController extends Controller
{
    use GalleryPhoto;
    protected $model = RoomPhoto::class;
}
