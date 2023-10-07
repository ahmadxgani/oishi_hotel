@extends('layouts.dashboard')
@vite(['resources/css/hideText.css'])

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Facility</h3>
                    <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the
                        full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="float-end">
                        <a href="{{ route('admin.facility.create') }}" class="btn btn-primary">Add Facility <i
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
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facilities as $f)
                                <tr>
                                    <td>{{ $f->id }}</td>
                                    <td>{{ $f->name }}</td>
                                    <td>
                                        <div class="hide-partially" style="width: 500px">
                                            {{ $f->description }}
                                        </div>
                                    </td>
                                    <td>{{ $f->created_at }}</td>
                                    <td>{{ $f->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('admin.facility.edit', $f->id) }}"
                                                    class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('admin.facility.show', $f->id) }}"
                                                    class="btn btn-sm btn-primary"><i data-feather="eye"></i></a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('admin.facility.destroy', $f->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            data-feather="trash"></i></button>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
