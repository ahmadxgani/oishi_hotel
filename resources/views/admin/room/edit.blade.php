@extends('layouts.dashboard')

{{-- TODO: deleted photos, new photos, existed/persistent photos --}}

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit a room type</h3>
                    <p class="text-subtitle text-muted">
                        modify and enhance room information with our intuitive room data editing feature.
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.room.update', $room->id) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Name Type</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" id="name" class="form-control" name="name"
                                            value="{{ $room->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea name="description" id="description" class="form-control" value="{{ $room->description }}">{{ $room->description }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="publish_rate">Publish Rate</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="publish_rate" class="form-control"
                                            name="publish_rate" value="{{ $room->publish_rate }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="publish_rate">Assets</label>
                                    </div>
                                    <div class="col-md-8" id="containerImage">
                                        <input type="file" name="photos[]" multiple accept="image/*">
                                    </div>

                                    <div class="col-md-4">
                                        <div id="carouselExample" class="carousel slide">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="card">
                                                        <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100"
                                                            alt="...">
                                                        <button type="submit" class="btn btn-sm float-end z-1">
                                                            <i data-feather="x" aria-label="close" class="text-white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="card">
                                                        <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100"
                                                            alt="...">
                                                        <button type="submit" class="btn btn-sm float-end z-1">
                                                            <i data-feather="x" aria-label="close" class="text-white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="card">
                                                        <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100"
                                                            alt="...">
                                                        <button type="submit" class="btn btn-sm float-end z-1">
                                                            <i data-feather="x" aria-label="close" class="text-white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next z-0" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
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
