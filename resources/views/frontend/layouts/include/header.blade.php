<header class="main_header_arae">

    <!-- Navbar Bar -->
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('homePage') }}">
                            <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('homePage') }}">
                        <img src="{{ asset('uploads/settings') }}/{{ $setting->site_logo }}" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('homePage') }}" class="nav-link {{ Route::is('homePage')?'active':''  }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aboutPage') }}" class="nav-link {{ Route::is('aboutPage')?'active':''  }}">About</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Causes
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="causes.html" class="nav-link">Causes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="causes-1.html" class="nav-link">Causes v1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cause-details.html" class="nav-link">Causes Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cause-details-1.html" class="nav-link">Causes Details v1</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Events
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="events.html" class="nav-link">Events</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="event-details.html" class="nav-link">Events Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Gallery
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="gallery-grid.html" class="nav-link">Gallery One</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="gallery-slider.html" class="nav-link">Gallery Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    News
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="news.html" class="nav-link">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="news-details.html" class="nav-link">News Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about-2.html" class="nav-link">About v2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about-3.html" class="nav-link">About v3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="make-donation.html" class="nav-link">Make Donation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="testimonials.html" class="nav-link">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="volunter.html" class="nav-link">Volunter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="login.html" class="nav-link">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="registration.html" class="nav-link">Register</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faqs.html" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="terms-service.html" class="nav-link">Terms Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="error.html" class="nav-link">404 Error</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">Contact</a>
                            </li>
                        </ul>
                        <div class="others-options d-flex align-items-center">

                            <div class="option-item">
                                @auth
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn_navber">Dashboard</a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn_navber">Login</a>
                                    <a href="{{ route('register') }}" class="btn btn_navber">Register</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                @auth
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn_navber">Dashboard</a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn_navber">Login</a>
                                    <a href="{{ route('register') }}" class="btn btn_navber">Register</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
