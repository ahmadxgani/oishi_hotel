<?php

namespace App\Trait;

trait GalleryPhoto {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = $this->model::all();
        $items = $this->type_photo::all();
        return view('admin.gallery.index', compact('photos', 'items'));
    }

    // todo: is that possible to use DI in the trait? instead of actual id

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
