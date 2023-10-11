@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Booking Room</h3>
                    <p class="text-subtitle text-muted">
                        ensure a smooth booking experience, user-friendly process, and enables seamless room reservations
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card w-50">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('booking_guest.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="date_book_start">Date Book Start</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="date" id="date_book_start" class="form-control"
                                            name="date_book_start" value="{{ old('date_book_start') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_book_end">Date Book End</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="date" id="date_book_end" class="form-control"
                                            name="date_book_end" value="{{ old('date_book_end') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nr_adults">Number of Adults</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="nr_adults" class="form-control" name="nr_adults"
                                            value="{{ old('nr_adults') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nr_children">Number of Children</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="nr_children" class="form-control"
                                            name="nr_children" value="{{ old('nr_children') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nr_rooms">Number of Rooms</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="nr_rooms" class="form-control" name="nr_rooms"
                                            value="{{ old('nr_rooms') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="room_type">Room Type</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="form-select" name="room_type" id="room_type">
                                            <option>Select room type</option>
                                            @foreach ($rooms as $r)
                                                <option value="{{ $r->id }}">{{ $r->name }}</option>
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
