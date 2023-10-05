@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Rooms & Suite</h3>
                    <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the
                        full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="float-end">
                        <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Add Room <i data-feather="plus"></i></a>
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
                                <th>No Room</th>
                                <th>Publish Rate</th>
                                <th>Type Room</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $r)
                                <tr>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->no_room }}</td>
                                    <td>{{ $r->publish_rate }}</td>
                                    <td>{{ $r->type() }}</td>
                                    <td>{{ $r->created_at }}</td>
                                    <td>{{ $r->updated_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('admin.room.edit', $r->id) }}" class="btn btn-sm btn-primary"><i data-feather="edit"></i></a>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('admin.room.show', $r->id) }}" class="btn btn-sm btn-primary"><i data-feather="eye"></i></a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('admin.room.destroy', $r->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"><i data-feather="trash"></i></button>
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
