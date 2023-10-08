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
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Filter</option>
                            <option value="1">Facility</option>
                            <option value="2">Type of Room</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/item_2.jpg') }}" class="card-img-top img-fluid"
                            style="height: 250px;object-fit: cover" alt="...">
                        <div class="card-body d-flex justify-content-between">
                            <h4 class="card-title">Category <span class="badge bg-primary">facility</span></h4>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-1"><i data-feather="trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span class="card-text"><small>created at <code>2023-10-07 11:59:52</code></small></span>
                            <span class="card-text"><small>updated at <code>2023-10-07 11:59:52</code></small></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/item_2.jpg') }}" class="card-img-top img-fluid"
                            style="height: 250px;object-fit: cover" alt="...">
                        <div class="card-body d-flex justify-content-between">
                            <h4 class="card-title">Category <span class="badge bg-primary">type of room</span></h4>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-1"><i data-feather="trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span class="card-text"><small>created at <code>2023-10-07 11:59:52</code></small></span>
                            <span class="card-text"><small>updated at <code>2023-10-07 11:59:52</code></small></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('images/item_2.jpg') }}" class="card-img-top img-fluid"
                            style="height: 250px;object-fit: cover" alt="...">
                        <div class="card-body d-flex justify-content-between">
                            <h4 class="card-title">Category <span class="badge bg-primary">facility</span></h4>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-1"><i data-feather="trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <span class="card-text"><small>created at <code>2023-10-07 11:59:52</code></small></span>
                            <span class="card-text"><small>updated at <code>2023-10-07 11:59:52</code></small></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
