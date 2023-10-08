@extends('layouts.dashboard')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add a new room</h3>
                    <p class="text-subtitle text-muted">
                        Use this feature to easily incorporate a new room into the system. it's a resource that you can
                        efficiently input all the necessary information.
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card w-50">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.room.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no_room">No Room</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="no_room" class="form-control" name="no_room"
                                            value="{{ old('no_room') }}">
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
                                                    {{ old('type_room') ? 'selected' : '' }}>{{ $tr->name }}</option>
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
