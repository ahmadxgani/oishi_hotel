@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add a new facility</h3>
                    <p class="text-subtitle text-muted">
                        Use this feature to easily incorporate a new facility into the system. it's a resource that you can
                        efficiently input all the necessary information and specifications to
                        make it accessible and manageable within the system.
                    </p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card w-50">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.facility.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Name Type</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" id="name" class="form-control" name="name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="publish_rate">Assets</label>
                                    </div>
                                    <div class="col-md-8" id="containerImage">
                                        <input type="file" name="photos[]" multiple accept="image/*">
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
