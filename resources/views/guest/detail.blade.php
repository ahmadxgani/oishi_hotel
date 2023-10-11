@extends('layouts.dashboard')

@section('content')
    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Booking Ticket
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge text-bg-primary">{{ $booking_guest->status }}</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Invoice Rp. {{ $booking_guest->total_price }} for
                            {{ $booking_guest->booking_items->count() }} rooms</h5>
                        <p class="card-text"><i data-feather="users"></i> Number of Adult {{ $booking_guest->nr_adults }}</p>
                        <p class="card-text"><i data-feather="users"></i> Number of Children
                            {{ $booking_guest->nr_children }}</p>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-danger">Cancel</a>
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
@endsection
