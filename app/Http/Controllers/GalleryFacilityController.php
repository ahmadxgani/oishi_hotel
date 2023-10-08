<?php

namespace App\Http\Controllers;

use App\Models\FacilityPhoto;
use App\Trait\GalleryPhoto;

class GalleryFacilityController extends Controller
{
    use GalleryPhoto;
    protected $model = FacilityPhoto::class;
}
