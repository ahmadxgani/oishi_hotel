@extends('layouts.dashboard')
@vite(['resources/css/hideText.css'])

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Booking Management</h3>
                    <p class="text-subtitle text-muted">Booking Room Management, allows you to efficiently oversee and manage
                        room reservations.</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <form>
                        <div class="input-group">
                            <label class="input-group-text" id="search" for="search_item"><i
                                    data-feather="search"></i></label>
                            <input type="text" class="form-control" id="search_item" name="search_item"
                                placeholder="Search Item">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest Name</th>
                                <th>Status Booking</th>
                                <th>Invoice</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($bookings->isEmpty())
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Empty, No data can be displayed</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif

                            @foreach ($bookings as $b)
                                <tr>
                                    <td>{{ $b->id }}</td>
                                    <td>{{ $b->user->name }}</td>
                                    <td>
                                        <span class="badge text-bg-{{ $b->class() }}">{{ $b->status }}</span>
                                    </td>
                                    <td>Rp. {{ $b->total_price }}</td>
                                    <td>?</td>
                                    <td>?</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('booking_receptionist.show', 1) }}"
                                                    class="btn btn-sm btn-primary"><i data-feather="eye"></i> Detail
                                                    Ticket</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $bookings->links() !!}
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
