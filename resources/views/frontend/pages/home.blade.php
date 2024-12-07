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

    <!-- special section -->
    @if ($special->status == 1)
        <section id="about_area" class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="about_area_img">
                            <img src="{{ asset('uploads/others') }}/{{ $special->photo }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="about_area_main_text">
                            <div class="about_area_heading">
                                <img src="{{ asset('assets/frontend') }}/img/icon/about.png" alt="img">
                            </div>
                            <div class="about_area_heading_two">
                                <h2>{{ $special->heading }}</h2>
                                <h3>{{ $special->sub_heading }}</h3>
                            </div>
                            <div class="about_area_para">
                                <h5>{!! $special->text !!}</h5>
                            </div>
                            <div class="about_vedio_area">
                                @if ($special->button_link)
                                    <a href="{{ $special->button_link }}"
                                        class="btn btn_theme btn_md">{{ $special->button_name }}</a>
                                @endif
                                @if ($special->video_id)
                                    <a href="https://www.youtube.com/watch?v={{ $special->video_id }}"
                                        class="vedio_btn popup-vimeo"><i
                                            class="fa fa-play"></i>{{ $special->video_button_name }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- feature section -->
    <section id="home_five_card_area" class="section_padding">
        <div class="container">
            <div class="row">
                @foreach ($features as $feature)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                        <a href="#!">
                            <div class="card_five_wrapper">
                                <img src="{{ asset('uploads/feature') }}/{{ $feature->icon }}" alt="icon">
                                <h3>{{ $feature->title }}</h3>
                                <p>{{ $feature->text }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
