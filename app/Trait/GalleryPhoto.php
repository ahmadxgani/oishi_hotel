<?php

namespace App\Trait;

use Illuminate\Http\Request;

trait GalleryPhoto {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = $this->model::all();
        return view('admin.gallery.index', compact('photos'));
    }

    // todo: is that possible to use DI in the trait? instead of actual id

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = $this->model::findOrFail($id);
        $photo->delete();

        toast('Photo successfully deleted', 'success');
        return back();
    }
}
