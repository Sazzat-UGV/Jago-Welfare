<section id="subscribe_area">
    <div class="container">
        <div class="subscribe_wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="subscribe_text">
                        <p>Newsletter</p>
                        <h3>To get weekly & monthly news,
                            <span class="color_big_heading">Subscribe</span> to our newsletter.
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cta_right_side">
                        <form action="{{ route('subscribe') }}" id="subscribe_form" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    placeholder="Your mail address" required="">
                                <button class="btn btn_theme btn_md" type="submit">Subscribe</button>
                                @error('email')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="footer_area_about">
                    <img src="{{ asset('assets/frontend') }}/img/logo.png" alt="img">
                    <p>Lorem ipsum dolor sit amet consec elit sed eiusmod tempor incididunt ut labore etdolore magna
                        aliqua.</p>
                    <h6><strong>Address:</strong> 858 Walnutwood Ave. Webster, NY 14580</h6>
                    <h6><strong>Phone:</strong> <a href="tel:123-284-2554">+011 234-567-890</a></h6>
                    <h6><strong>Email:</strong> <a href="mailto:info@example.com">info@example.com</a></h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                <div class="footer_navitem_ara">
                    <h3>Quick links</h3>
                    <div class="nav_item_footer">
                        <ul>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="causes.html">Services</a></li>
                            <li><a href="events.html">Projects</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="about.html">Career</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                <div class="footer_navitem_ara">
                    <h3>Support</h3>
                    <div class="nav_item_footer">
                        <ul>
                            <li><a href="{{ route('faqPage') }}">FAQ</a></li>
                            <li><a href="#">Causes</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('termsCondition') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="footer_navitem_ara">
                    <h3>Latest tweets</h3>
                    <div class="footer_twitter_area">
                        <a href="#!" class="footer_twit_title"><i class="fab fa-twitter"></i>
                            #digitalmarketing</a>
                        <p>Lorem ipsum dolor sit amet consec elit sed eiusmod tempor incididunt ut labore etdolore
                            magna aliqua. Sit amet consec elit sed eiusmod tempor</p>
                        <a href="#!" class="footer_twit_two">twitter.com/i/#puredrinkingwater</a>
                        <h6>December 13, 2021 04:20 PM</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
