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

        .countdown {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .boxes {
            display: flex;
            gap: 15px;
        }

        .box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: #E03C33;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90px;
            height: 100px;
        }


        .num {
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
        }

        .name {
            font-size: 0.9rem;
            text-align: center;
            color: #fff;
            margin-top: 5px;
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

                        @if ($event->date && \Carbon\Carbon::parse($event->date . ' ' . $event->time)->isFuture())
                            <div class="sidebar_boxed">
                                <div class="countdown show" data-Date='{{ $event->date }} {{ $event->time }}'>
                                    <div class="boxes running">
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="days"></span></timer>
                                            </div>
                                            <div class="name">Days</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="hours"></span></timer>
                                            </div>
                                            <div class="name">Hours</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="minutes"></span></timer>
                                            </div>
                                            <div class="name">Minutes</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="seconds"></span></timer>
                                            </div>
                                            <div class="name">Seconds</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="sidebar_boxed">
                                <div class="countdown show">
                                    <div class="boxes running">
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="">00</span></timer>
                                            </div>
                                            <div class="name">Days</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="">00</span></timer>
                                            </div>
                                            <div class="name">Hours</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="">00</span></timer>
                                            </div>
                                            <div class="name">Minutes</div>
                                        </div>
                                        <div class="box">
                                            <div class="num">
                                                <timer><span class="">00</span></timer>
                                            </div>
                                            <div class="name">Seconds</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Project Organizer -->
                        <div class="sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Event details</h3>
                            </div>
                            <div class="event_details_list">
                                <ul>

                                        <li>Ticket Price: <span>{{ $event->price }}<b>$</b></span></li>
                                    
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
                        @if ($event->date && \Carbon\Carbon::parse($event->date . ' ' . $event->time)->isFuture())
                            @if ($event->price != 0)
                                <div class="recent_causes_wrapper sidebar_boxed">
                                    <div class="sidebar_heading_main">
                                        <h3>Buy Ticket</h3>
                                    </div>
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="register_now_details">
                                            <div class="mb-3">
                                                <select class="form-select" name="" id="">
                                                    <option selected>How Many Tickets</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" name="" id="">
                                                    <option selected>Select Payment Method</option>
                                                    <option value="">PayPal</option>
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
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="register_now_details">
                                            <div class="mb-3">
                                                <select class="form-select" name="" id="">
                                                    <option selected>How Many Tickets</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <button class="btn btn_theme btn_md w-100">Book Now</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
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
    <script src="{{ asset('assets/frontend/js/multi-countdown.js') }}"></script>
@endpush
