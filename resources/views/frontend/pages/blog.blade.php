@extends('frontend.layouts.app')
@section('title')
    Blog
@endsection
@push('style')
@endpush
@section('content')
    @include('frontend.layouts.include.banner', ['page_name' => 'Blog', 'subpage_name' => ''])
    <h1 class="text-center">Blog Page</h1>
@endsection
@push('script')
@endpush
