@extends('frontend.layouts.app')
@section('title')
    Event Details
@endsection
@push('style')
    <style>
        iframe {
            border: 0;
            width: 100%;
        }
    </style>
@endpush
@section('content')
    @include('frontend.layouts.include.banner', [
        'page_name' => $event->name,
        'subpage_name' => 'Event Details',
    ])
    <section id="trending_causes_main" class="section_padding">
        <div class="container">
            <div class="row" id="counter">
                <div class="col-lg-8">
                    <div class="details_wrapper_area">
                        <div class="details_big_img">
                            <img src="{{ asset('uploads/event') }}/{{ $event->featured_photo }}" alt="img">
                        </div>
                        <div class="details_text_wrapper">
                            <h2>{{ $event->name }}</h2>
                            <p>{!! $event->description !!}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_first">
                        <div class="sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Countdown to Event</h3>
                            </div>
                            <div class="event_countdown">
                                <p>
                                    0 days remaining until the event.
                                </p>
                            </div>
                        </div>
                        <!-- Project Organizer -->
                        <div class="sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Event details</h3>
                            </div>
                            <div class="event_details_list">
                                <ul>
                                    @if ($event->price != 0)
                                        <li>Ticket Price: <span>{{ $event->price }}<b>$</b></span></li>
                                    @endif
                                    <li>Location: <span>{{ $event->location }}</span></li>
                                    <li>Date: <span> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</span>
                                    </li>
                                    <li>Time: <span>{{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</span>
                                    </li>
                                    @if ($event->email)
                                        <li>Email:
                                            <span>{{ $event->email }}</span>
                                        </li>
                                    @endif
                                    <li>Phone: <span>{{ $event->phone }}</span>
                                    </li>
                                    <li>Total Seat: <span>{{ $event->total_seat }}</span>
                                    </li>
                                    <li>Booked Seat: <span>{{ $event->booked_seat }}</span>
                                    </li>
                                    <li>Remaining Seat: <span>{{ $event->total_seat - $event->booked_seat }}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @if ($event->price != 0)
                            <div class="recent_causes_wrapper sidebar_boxed">
                                <div class="sidebar_heading_main">
                                    <h3>Buy Ticket</h3>
                                </div>
                                <form action="">
                                    <div class="register_now_details">
                                        <div class="mb-3">
                                            <select class="form-select" name="" id="">
                                                <option selected>Select Payment Method</option>
                                                <option value="">PayPal</option>
                                                </option>
                                                <option value="">Stripe</option>
                                            </select>
                                        </div>
                                        <button class="btn btn_theme btn_md w-100">Make Payment</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if ($event->price == 0)
                            <div class="recent_causes_wrapper sidebar_boxed">
                                <div class="sidebar_heading_main">
                                    <h3>Free Booking</h3>
                                </div>
                                <form action="">
                                    <div class="register_now_details">
                                        <button class="btn btn_theme btn_md w-100">Book Now</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        <div class="recent_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Recent events</h3>
                            </div>
                            @foreach ($recent_events as $revent)
                                <div class="recent_donet_item">
                                    <div class="recent_donet_text">
                                        <div class="sidebar_inner_heading">
                                            <h4><a
                                                    href="{{ route('singleEventPage', $revent->slug) }}">{{ $revent->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- Map Causes -->
                        @if ($event->map)
                            <div class="share_causes_wrapper sidebar_boxed">
                                {!! $event->map !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
