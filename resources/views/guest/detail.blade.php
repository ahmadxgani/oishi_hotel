@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Booking Ticket
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge text-bg-{{ $booking_guest->class() }}">{{ $booking_guest->status }}</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Invoice Rp. {{ $booking_guest->total_price }} for
                            {{ $booking_guest->booking_items->count() }} rooms</h5>
                        <p class="card-text"><i data-feather="users"></i> Number of Adult {{ $booking_guest->nr_adults }}</p>
                        <p class="card-text"><i data-feather="users"></i> Number of Children
                            {{ $booking_guest->nr_children }}</p>
                        <p class="card-text">
                            No room:
                            @foreach ($booking_guest->booking_items as $bi)
                                <code>{{ $bi->room->no_room }}{{ !$loop->last ? ', ' : '' }}</code>
                            @endforeach
                        </p>
                        <div class="row">
                            <div class="col">
                                <button disabled={{ $booking_guest->status === 'cancelled' }} type="button"
                                    class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete"><i
                                        data-feather="x"></i>
                                    Cancel</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary float-end">
                                    {{ $booking_guest->booking_items[0]->room->room_type()->name }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-body-secondary text-center">
                        Start from {{ $booking_guest->date_book_start }} until {{ $booking_guest->date_book_end }}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to cancel this request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('booking_guest.destroy', $booking_guest->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
