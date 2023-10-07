@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Facility</h3>
                    <p class="text-subtitle text-muted">This record created at <code>{{ $facility->created_at }}</code> and
                        last
                        updated at <code>{{ $facility->updated_at }}</code>.</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">{{ $facility->name }}</h4>
                        </div>
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/item_2.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $facility->description }}
                            </p>
                        </div>
                        <div class="card-body d-flex justify-content-end">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('admin.facility.edit', $facility->id) }}"
                                        class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('admin.facility.destroy', $facility->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                data-feather="trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
