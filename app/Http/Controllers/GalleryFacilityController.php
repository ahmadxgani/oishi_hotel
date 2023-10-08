<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityPhoto;
use App\Trait\GalleryPhoto;
use Illuminate\Http\Request;

class GalleryFacilityController extends Controller
{
    use GalleryPhoto;
    protected $model = FacilityPhoto::class;
    protected $type_photo = Facility::class;

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FacilityPhoto $facility)
    {
        // todo: validate the request XD
        $facility->update([
            'facility_id' => $request->linked_id
        ]);

        toast('Photo successfully updated', 'success');
        return back();
    }
}
