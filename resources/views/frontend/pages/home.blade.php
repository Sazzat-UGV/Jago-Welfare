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
    <section id="about_area" class="section_padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about_area_img">
                        <img src="{{ asset('assets/frontend') }}/img/common/about.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about_area_main_text">
                        <div class="about_area_heading">
                            <img src="{{ asset('assets/frontend') }}/img/icon/about.png" alt="img">
                        </div>
                        <div class="about_area_heading_two">
                            <h2>A world where <span class="color_big_heading">poverty</span> <br>
                                will not exists</h2>
                            <h3>We are the largest crowdfunding</h3>
                        </div>
                        <div class="about_area_para">
                            <h5>Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do
                                eiusmod tempor incididunt ut labore.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do
                                eiusmod tempor incididunt ut labore et simply free text dolore magna
                                aliqua lonm andhn.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do
                                eiusmod tempor incididunt ut labore et simply.</p>
                        </div>
                        <div class="about_vedio_area">
                            <a href="about.html" class="btn btn_theme btn_md">Learn more</a>
                            <a href="https://vimeo.com/45830194" class="vedio_btn popup-vimeo"><i class="fa fa-play"></i>How
                                we work</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
