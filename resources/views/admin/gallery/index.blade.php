@extends('layouts.dashboard')
@vite(['resources/css/hideText.css'])

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Assets Gallery</h3>
                    <p class="text-subtitle text-muted">Manage a collection of hotel's photos, Effortlessly organize and
                        showcase your hotel's photos with our user-friendly platform. Elevate your online presence and
                        impress potential guests with stunning visuals.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Filter
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.gallery.facility.index') }}">Facility</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('admin.gallery.type_room.index') }}">Type of
                                        Room</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                @foreach ($photos as $photo)
                    <div class="col-4">
                        <div class="card">
                            <img src="{{ asset($photo->image) }}" class="card-img-top img-fluid"
                                style="height: 250px;object-fit: cover" alt="...">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    {{-- todo: does this is a good practice? --}}
                                    <h4 class="card-title">{{ ($photo->facility ?? $photo->room_type)->name }}</h4>
                                    <h6 class="card-subtitle">Category <span
                                            class="badge bg-primary text-capitalize">{{ str_replace('_', ' ', request()->segment(3)) }}</span>
                                    </h6>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $photo->id }}" class="btn btn-sm btn-primary"><i
                                                data-feather="edit"></i></button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{ $photo->id }}"><i
                                                data-feather="trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <span class="card-text"><small>created at
                                        <code>{{ $photo->created_at }}</code></small></span>
                                <span class="card-text"><small>updated at
                                        <code>{{ $photo->updated_at }}</code></small></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delete-{{ $photo->id }}" tabindex="-1" aria-labelledby="deleteLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteLabel">Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete this record?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form
                                        action="{{ route('admin.gallery.' . request()->segment(3) . '.destroy', $photo->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit-{{ $photo->id }}" tabindex="-1" aria-labelledby="editLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editLabel">Edit a room type</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form
                                    action="{{ route('admin.gallery.' . request()->segment(3) . '.update', $photo->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="linked_id" class="col-form-label">Choose Room Type</label>
                                            <select name="linked_id" id="linked_id" class="form-select">
                                                {{-- todo: does this is a good practice? --}}
                                                @foreach ($items as $i)
                                                    <option value="{{ $i->id }}"
                                                        {{ ($photo->type_room_id ?? $photo->facility_id) == $i->id ? 'selected' : '' }}>
                                                        {{ $i->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
