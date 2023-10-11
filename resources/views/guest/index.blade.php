@extends('layouts.dashboard')
@vite(['resources/css/hideText.css'])

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Booking History</h3>
                    <p class="text-subtitle text-muted">Your Booking History, A Record of Your Past Reservations</p>
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
                                <th>Book Start</th>
                                <th>Book End</th>
                                <th>Invoice</th>
                                <th>Total Room</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $b)
                                <tr>
                                    <td>{{ $b->id }}</td>
                                    <td>{{ $b->date_book_start }}</td>
                                    <td>{{ $b->date_book_end }}</td>
                                    <td>Rp. {{ $b->total_price }}</td>
                                    <td>{{ $b->nr_rooms }}</td>
                                    <td>
                                        <span class="badge text-bg-primary">{{ $b->status }}</span>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('booking_guest.show', $b->id) }}"
                                                    class="btn btn-sm btn-primary"><i data-feather="eye"></i>
                                                    Ticket</a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-1"><i data-feather="x"></i> Cancel</button>
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
