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
                                <h4 class="card-title">Category <span
                                        class="badge bg-primary text-capitalize">{{ str_replace('_', ' ', request()->segment(3)) }}</span>
                                </h4>
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
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
                    <div class="modal fade" id="delete-{{ $photo->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
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
                @endforeach
            </div>
        </section>
    </div>
@endsection
