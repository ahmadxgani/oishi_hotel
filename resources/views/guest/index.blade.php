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
                                    <td>{{ $b->date_book_start }}</td>
                                    <td>{{ $b->date_book_end }}</td>
                                    <td>Rp. {{ $b->total_price }}</td>
                                    <td>{{ $b->nr_rooms }}</td>
                                    <td>
                                        <span class="badge text-bg-{{ $b->class() }}">{{ $b->status }}</span>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('booking_guest.show', $b->id) }}"
                                                    class="btn btn-sm btn-primary"><i data-feather="eye"></i>
                                                    Ticket</a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-{{ $b->id }}"><i data-feather="x"></i>
                                                    Cancel</button>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                <div class="modal fade" id="delete-{{ $b->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to cancel this request?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('booking_guest.destroy', $b->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
