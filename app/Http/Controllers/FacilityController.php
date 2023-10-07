<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\FacilityPhoto;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::all();

        return view('admin.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $r)
    {
        $facility = Facility::create([
            'name'          => $r->name,
            'description'   => $r->description,
        ]);

        foreach ($r->file('photos') as $file) {
            $path = $file->store('public/facilities');
            FacilityPhoto::create([
                'facility_id' => $facility->id,
                'image'    => $path
            ]);
        }

        toast('Facility successfully added to the record', 'success');
        return redirect()->route('admin.facility.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        return view('admin.facility.detail', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('admin.facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $r, Facility $facility)
    {
        $facility->update([
            'description'   => $r->description,
            'name'          => $r->name,
        ]);

        toast('Facility successfully updated', 'success');
        return redirect()->route('admin.facility.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        toast('Facility successfully deleted', 'success');
        return redirect()->route('admin.facility.index');
    }
}
