@extends('frontend.layouts.app')
@section('title')
    Home
@endsection
@push('style')
@endpush
@section('content')
    <!-- slider section -->
    <section id="home_five_banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_five_slider_wrapper owl-carousel owl-theme arrow_style owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all; width: 100%;">
                                @foreach ($sliders as $slider)
                                    <div class="owl-item" style="width: 100%;">
                                        <div class="banner_slider_item bg_one"
                                            style="background-image: url('{{ asset('uploads/slider') }}/{{ $slider->image }}'); width: 100%;">
                                            <div class="banner_five_text">
                                                <h1>{{ $slider->title }}</h1>
                                                <p>{{ $slider->description }}</p>
                                                @if ($slider->button_link)
                                                    <div class="home_five_banner_button">
                                                        <a href="{{ $slider->button_link }}"
                                                            class="btn btn_theme btn_md">{{ $slider->button_name }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <button type="button" role="presentation" class="owl-next">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
