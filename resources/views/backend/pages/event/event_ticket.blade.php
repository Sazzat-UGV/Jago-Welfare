@extends('backend.layouts.app')
@section('title')
    Tickets
@endsection
@push('style')
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    @include('backend.layouts.include.breadcrumb', [
        'parent_page' => 'Events',
        'page_name' => 'Tickets',
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Created at</th>
                                <th>User</th>
                                <th>Payment ID</th>
                                <th>Unit Price</th>
                                <th>No of Ticket</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($eventTicket as $index => $ticket)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                    <td>{{ $ticket->user_id }}</td>
                                    <td>{{ $ticket->payment_id }}</td>
                                    <td>{{ $ticket->unit_price }}<b>$</b></td>
                                    <td>{{ $ticket->number_of_tickets }}</td>
                                    <td>{{ $ticket->total_price }}<b>$</b></td>
                                    <td>ACtion</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No data available in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@push('script')
@endpush
