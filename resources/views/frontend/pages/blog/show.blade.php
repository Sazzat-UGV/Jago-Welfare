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
    <section id="news_details_main" class="section_padding">
        <div class="container">
            <div class="row" id="counter">
                <div class="col-lg-8">
                    <div class="details_wrapper_area">
                        <div class="details_big_img">
                            <img src="{{ asset('uploads/blog') }}/{{ $blog_detail->photo }}" alt="img">
                        </div>
                        <div class="details_text_wrapper">
                            <h2>{{ $blog_detail->title }}</h2>
                            <p>{{ $blog_detail->description }}</p>
                        </div>

                        <div class="comment_area_details">
                            <h3>2 Comments</h3>
                            <div class="post_comment_wrapper">
                                <div class="post_comment_item">
                                    <div class="post_comment_img">
                                        <img src="{{ asset('assets/frontend') }}/img/common/post-1.png" alt="img">
                                    </div>
                                    <div class="post_comment_text">
                                        <div class="post_names_replay">
                                            <h5>James martin</h5>
                                            <a href="#!"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum. There are
                                            many variations of passages of Lorem Ipsum available but the majority.</p>
                                    </div>
                                </div>
                                <div class="post_comment_item">
                                    <div class="post_comment_img">
                                        <img src="{{ asset('assets/frontend') }}/img/common/post-2.png" alt="img">
                                    </div>
                                    <div class="post_comment_text">
                                        <div class="post_names_replay">
                                            <h5>James martin</h5>
                                            <a href="#!"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum. There are
                                            many variations of passages of Lorem Ipsum available but the majority.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="comment_form_area">
                            <h3>Leave a comment</h3>
                            <div class="comment_form">
                                <form action="#!" id="comment_form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter full name"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter email address"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea rows="5" placeholder="Write your comments" class="form-control" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="submit_btn">
                                                <button class="btn btn_theme btn_md">Submit comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_first">

                        <!-- Recent Causes -->
                        <div class="recent_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Recent news</h3>
                            </div>
                            @foreach ($recent_news as $news)
                                <div class="recent_donet_item">
                                    <div class="recent_donet_img">
                                        <a href="{{ route('singleBlogPage', $news->id) }}"><img
                                                src="{{ asset('uploads/blog') }}/{{ $news->photo }}" alt="img"></a>
                                    </div>
                                    <div class="recent_donet_text">
                                        <div class="sidebar_inner_heading">
                                            <h4><a href="{{ route('singleBlogPage', $news->id) }}">{{ $news->title }}</a>
                                            </h4>
                                        </div>
                                        <h6>{{ $news->created_at->format('d M, Y') }}</h6>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Popular tags -->
                        <div class="share_causes_wrapper sidebar_boxed">
                            <div class="sidebar_heading_main">
                                <h3>Popular tags</h3>
                            </div>
                            <div class="popular_tags">
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li><a href="javascript:void(0)">{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
