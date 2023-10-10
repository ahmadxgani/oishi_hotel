@extends('layouts.dashboard')
@vite(['resources/css/hideText.css'])

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Booking List</h3>
                    <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the
                        full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="float-end">
                        <a href="{{ route('admin.type_room.create') }}" class="btn btn-primary">Add Room <i
                                data-feather="plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Publish Rate</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X</td>
                                <td>X</td>
                                <td>
                                    <div class="hide-partially" style="width: 500px">
                                        X
                                    </div>
                                </td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('admin.type_room.edit', 1) }}"
                                                class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('admin.type_room.show', 1) }}"
                                                class="btn btn-sm btn-primary"><i data-feather="eye"></i></a>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete-X"><i data-feather="trash"></i></button>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <div class="modal fade" id="delete-X" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.type_room.destroy', 1) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
