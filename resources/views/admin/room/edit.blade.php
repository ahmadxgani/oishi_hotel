@extends('layouts.dashboard')

{{-- TODO: deleted photos, new photos, existed/persistent photos --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit a room</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('admin.room.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="no_room">No Room</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input required type="text" id="no_room" class="form-control" name="no_room" disabled
                                    value="{{ $room->no_room }}">
                            </div>
                            <div class="col-md-4">
                                <label for="publish_rate">Publish Rate</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input required type="number" id="publish_rate" class="form-control" name="publish_rate"
                                    value="{{ $room->publish_rate }}">
                            </div>
                            <div class="col-md-4">
                                <label for="type">Type Room</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <fieldset class="form-group">
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Select room type</option>
                                        @foreach (\App\Models\Room::TYPE_MAP as $type => $name)
                                            <?php $sel = $type === $room->type ? ' selected' : ''; ?>
                                            <option value="{{ $type }}"{!! $sel !!}>{{ $name }}
                                            </option>
                                        @endforeach
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
