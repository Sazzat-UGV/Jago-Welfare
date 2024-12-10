@extends('frontend.layouts.app')
@section('title')
    Blog Details
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.banner', [
        'page_name' => $blog_detail->title,
        'subpage_name' => 'Blog Details',
    ])
@endsection
@push('script')
@endpush
