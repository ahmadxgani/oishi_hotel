@extends('layouts.dashboard')

{{-- TODO: deleted photos, new photos, existed/persistent photos --}}

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit a room</h3>
                    <p class="text-subtitle text-muted">
                        modify and enhance room information with our intuitive room data editing feature.
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card w-50">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.room.update', $room->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no_room">No Room</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="no_room" class="form-control" name="no_room"
                                            value="{{ old('no_room', $room->no_room) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="type_room">Type Room</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="form-select" aria-label="Select type room" id="type_room"
                                            name="type_room">
                                            <option selected>Select type room</option>
                                            @foreach ($type_rooms as $tr)
                                                <option value="{{ $tr->id }}"
                                                    {{ old('type_room') || $tr->id == $room->type_room_id ? 'selected' : '' }}>
                                                    {{ $tr->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
