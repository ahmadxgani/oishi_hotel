@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add a new room</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('admin.room.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="no_room">No Room</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input required type="text" id="no_room" class="form-control" name="no_room">
                            </div>
                            <div class="col-md-4">
                                <label for="publish_rate">Price per night</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input required type="number" id="publish_rate" class="form-control" name="publish_rate">
                            </div>
                            <div class="col-md-4">
                                <label for="type">Type Room</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <fieldset class="form-group">
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Select room type</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="SuperiorKing">Superior King</option>
                                        <option value="SuperiorTwin">Superior Twin</option>
                                    </select>
                                </fieldset>
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
@endsection
