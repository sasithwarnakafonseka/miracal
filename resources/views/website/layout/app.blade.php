<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miracle | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_package/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_package/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_package/favicon-16x16.png">
    <link rel="manifest" href="/favicon_package/site.webmanifest">
    <link rel="mask-icon" href="/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/dark-mode.css">

    <!-- You must load 'dark-mode-switch.js' at the foot of the page -->
    <script src="/js/dark-mode-switch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>

</head>

<body id="page-top" class="no-scroll-y bg-white text-center d-flex h-100">
    <!-- Start: Preloader -->
    {{-- <section id="preloader-section">
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">

                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_fspoyunc.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>

                </div>

                <!-- Start: Preloader sides - Model 1 -->
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
                <!-- End: Preloader sides - Model 1 -->

            </div>
        </div>
    </section> --}}
    <!-- End: Preloader -->
    <div class="elfsight-app-2e73e14f-8c28-4155-9fd9-4cbf2fa38175"></div>
    <div class="container-fluid d-flex p-0 mx-auto flex-column">
        <header class="mb-auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-white w-100 navigation web-tab-navmenu-bar"
                id="navbar">
                <div class="container">
                    <a class="navbar-brand m-2 font-weight-bold" href="{{ route('/') }}"><img class="site-logo"
                            alt="Miracle" src="/global_assets/images/logo-menu.png"></a>
                    <!-- Toggler -->
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <!-- Collapse -->
                    <div class="navbar-collapse collapse justify-content-center" id="navbarCollapse" style="">

                        <!-- Navigation -->


                        <!-- Button -->

                    </div>

                    {{-- <span class="text-right">
                    <div class="icons">
                        <ul>
                            <li><a href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                        class="fa fa-search"></i></a></li>
                            <li><a href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                        class="fa fa-user"></i></a></li>
                            <li><a href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                        class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                </span> --}}


                    <div class="mx-auto order-0">
                        <ul style="" class="navbar-nav justify-content-center">


                            <li class="nav-item homePage">
                                <a href="{{ route('/') }}" class="nav-link">HOME</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarLandings"
                                    data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                                    SHOP
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarLandings">
                                    <div class="tab">
                                        <a href="/shop?category=10"> <button class="tablinks" id="defaultOpen">Skin
                                                Care</button></a>
                                        <a href="/shop?category=11"><button class="tablinks"
                                                onmouseover="openPortfolioTab(event, 'Hair-Care')">Hair
                                                Care</button></a>
                                        <a href="/shop?category=12"><button class="tablinks"
                                                onmouseover="openPortfolioTab(event, 'Pharmaceutical')">Pharmaceutical</button></a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item aboutPage" style="width:134px">
                                <a href="{{ route('/about') }}" class="nav-link">ABOUT US</a>
                            </li>
                            <li class="nav-item aboutPage" style="width:145px">
                                <a href="{{ route('help_faq') }}" class="nav-link">Help & Contact</a>
                            </li>
                            {{-- User icon and Cart icon end --}}


                            {{-- User icon and Cart icon end --}}

                        </ul>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ml-auto mr-auto">
                            <li class="nav-item">
                                <a onclick="searchBox();" class="nav-link navbar-link-2 waves-effect">
                                    <i class="fas fa-fw fa-search pl-0"></i>
                                </a>
                            </li>
                            @php
                                $totalItemNav = 0;
                                $totel_itemsItemNav = 0;
                            @endphp
                            @if (session('cart'))

                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $totalItemNav += $details['price'] * $details['quantity'];
                                        $totel_itemsItemNav += $details['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a data-toggle="dropdown cart-dropdown"
                                        style="padding-top: 52px; padding-bottom:52px;"><span
                                            class="badge badge-pill badge-danger menu-cart-qty-batch">{{ $totel_itemsItemNav }}</span>
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    <div class="dropdown-menu cart-dropdown">
                                        <div class="row total-header-section">
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                                    class="badge badge-pill badge-danger">{{ $totel_itemsItemNav }}</span>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                <p>Total: <span class="text-info">${{ $totalItemNav }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        @if (session('cart'))

                                            @foreach (session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img src="/storage/{{ $details['image'] }}">
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <p>{{ $details['name'] }}</p>
                                                                <span class="price text-info">
                                                                    LKR {{ $details['price'] }}</span> <span
                                                                    class="count">
                                                                    Quantity:{{ $details['quantity'] }}</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-liq-main remove-from-cart"
                                                                    product_id="{{ $id }}" type="button"
                                                                    id="button-addon2"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            @endforeach

                                        @endif

                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a class="cart-button-dropdwn"
                                                    @if ($totalItemNav > 0) href="/shop/checkout" @else href="javascript:void(0)" @endif><button
                                                        class="btn btn-primary btn-block">Checkout</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item">
                                    <a href="/my-account" class="nav-link navbar-link-2 waves-effect">
                                        <i class="fas fa-fw fa-user pl-0"></i>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="/my-account" class="nav-link navbar-link-2 waves-effect">
                                        <button type="button" class="btn btn-secondary btn-rounded">Login |
                                            Register</button>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
            </nav>

            {{-- Mobile and tab menu start --}}
            <div class="container mobile-tab-navmenu-bar"
                style="background: #ffffff; max-width: inherit; border-bottom: 2px solid #AE7529;">
                <div class="row align-items-center justify-content-between">
                    <a href="{{ route('/') }}" title="Site Logo" class="header-logo d-block">
                        <img class="site-logo" src="/global_assets/images/logo-menu.png"
                            style="width: 200px; height:96.1px; padding:10px;">
                    </a>
                    <nav class="d-none d-lg-block">
                        <ul
                            class="main-menu d-flex flex-column flex-lg-row align-items-lg-center list-unstyled p-0 m-0">
                            <li class="active">
                                <a href="javascript:void(0)" class="d-block" title="Home">
                                    <a href="{{ route('/') }}" class="nav-link">HOME</a>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link dropdown-toggle" id="navbarLandings"
                                    data-toggle="dropdown" href="#" aria-haspopup="true"
                                    aria-expanded="false">
                                    SHOP
                                </a>
                                <ul class="sub-menu list-unstyled p-0 m-0">
                                    <li>
                                        <a href="/shop?category=10"> <button class="tablinks" id="defaultOpen">Skin
                                                Care</button></a>
                                    </li>
                                    <li>
                                        <a href="/shop?category=11"><button class="tablinks"
                                                onmouseover="openPortfolioTab(event, 'Hair-Care')">Hair
                                                Care</button></a>
                                    </li>
                                    <li>
                                        <a href="/shop?category=12"><button class="tablinks"
                                                onmouseover="openPortfolioTab(event, 'Pharmaceutical')">Pharmaceutical</button></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('/about') }}" class="nav-link">ABOUT US</a>

                            </li>
                            <li>
                                <a href="{{ route('help_faq') }}" class="nav-link">Help & Contact</a>
                            </li>

                            <li class="nav-item">
                                <a href="/my-account" class="nav-link navbar-link-2 waves-effect"
                                    style="padding: 10px 10px; margin-top: 5px; margin-right:0px;">
                                    <i class="fas fa-fw fa-user pl-0" style="font-size: 20px; color:#006738"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('/shop/cart') }}" data-toggle="dropdown"
                                    style="padding: 10px 0px; margin-top: 5px;"><span
                                        class="badge badge-pill badge-danger menu-cart-qty-batch">{{ $totel_itemsItemNav }}</span>
                                    <i class="fa fa-shopping-cart" style="font-size: 20px; color:#AE7529"
                                        aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    {{-- <div id="call-action" class="d-none d-lg-flex align-items-center">
                    <a href="#" title="Call Now" class="d-none d-lg-inline-block call-action">Call Now</a>
                  </div> --}}
                    <div
                        class="side-menu-close d-flex d-lg-none flex-wrap flex-column align-items-center justify-content-center ml-auto">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>



        <!-- side menu start -->
        <div class="side-menu-wrap">
            <a href="{{ route('/') }}" title="Site Logo" class="side-menu-logo d-block py-3">
                <img class="site-logo" src="/global_assets/images/logo-menu.png"
                    style="width: 200px; height:96.1px; padding:10px;">
            </a>
            <nav class="side-menu-nav">
                <!-- auto generated side menu from top header menu -->
            </nav>
            <div class="side-menu-close d-flex flex-wrap flex-column align-items-center justify-content-center">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        {{-- Mobile and tab menu end --}}



        <!-- Sidebar -->
        </header>
        @if ($MainBanneritemSub != null)
            <section class="banner" id="section_slag">
                <div class="img-bg">
                    <div class="img-src" style="background-image:url('/storage/{{ $MainBanneritemSub->img }}')">
                    </div>
                    <div class="img-src img-blurred"
                        style="background-image:url('/storage/{{ $MainBanneritemSub->img }}')">
                    </div>
                    <div class="img-bg-content">
                        <div class="content">
                            <div class="slag_head" style="background-color: transparent;">
                                <p id="location_slag_head" class="location_slag_head"></p>
                            </div>
                            <div class="slag_body">
                                <p id="location_slag_body" class="location_slag_body"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        @yield('content')

        <footer class="footer-area footer--light">
            <div class="footer-big">
                <!-- start .container -->
                <div class="container-fluid footer-container">
                    <hr style="border-top: 1px solid rgb(255 255 255);">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="footer-widget">
                                <div class="widget-about">

                                    <h4 class="footer-widget-title liq-main-color"><a
                                            class="navbar-brand m-2 font-weight-bold" href="{{ route('/') }}"><img
                                                class="site-logo" alt="Miracle" style="margin-bottom: 0px;"
                                                src="/global_assets/images/logo-menu.png"></a></h4>
                                    <h4 style="text-align: initial;">Miracle Beauty Costmatics</h4>
                                    <p>We are trend setters and helping the beverage industry reaches its next
                                        level.
                                    </p>
                                    <ul class="contact-details">
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <a href="#"> Colombo, Sri Lanka.</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i></span>
                                            <a href="#"> support@aazztech.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Ends: .footer-widget -->
                        </div>
                        <!-- end /.col-md-4 -->
                        <div class="col-md-2 col-sm-2">
                            <div class="footer-widget">
                                <div class="footer-menu footer-menu--1">
                                    <h4 class="footer-widget-title liq-main-color">Menu</h4>
                                    <ul class="contact-details">
                                        <li>
                                            <a href="{{ route('/about') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('/shop') }}">Shop</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('/news-event') }}">News & Events</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('/blog') }}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Testimonials</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.footer-menu -->
                            </div>
                            <!-- Ends: .footer-widget -->
                        </div>
                        <!-- end /.col-md-3 -->

                        <div class="col-md-2 col-sm-2 footer-column-four-sec">
                            <div class="footer-widget">
                                <div class="footer-menu footer-menu-three">
                                    <h4 class="footer-widget-title liq-main-color">Products</h4>
                                    <ul>
                                        <li>
                                            <a href="">Skin Care</a>
                                        </li>
                                        <li>
                                            <a href="">Hair Care</a>
                                        </li>
                                        <li>
                                            <a href="">New Arrivals</a>
                                        </li>
                                        <li>
                                            <a href="">Mens</a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end /.footer-menu -->
                            </div>
                            <!-- Ends: .footer-widget -->
                        </div>


                        <div class="col-md-2 col-sm-2 footer-column-four-sec">
                            <div class="footer-widget">
                                <div class="footer-menu footer-menu-three">
                                    <h4 class="footer-widget-title liq-main-color">Account</h4>
                                    <ul>
                                        <li>
                                            <a href="{{ route('my-account') }}">My Account</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('/shop/cart') }}">My Basket</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('terms_policy') }}">Terms & Policy</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('help_faq') }}">Help & FAQ's</a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end /.footer-menu -->
                            </div>
                            <!-- Ends: .footer-widget -->
                        </div>
                        <!-- end /.col-lg-3 -->

                        <div class="col-md-3 col-sm-2 footer-column-four">
                            <div class="footer-widget">
                                <div class="footer-menu no-padding">
                                    <h4 class="footer-widget-title liq-main-color">Stay Connected</h4>
                                    <div class="icons">
                                        <ul>
                                            <li><a
                                                    href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                                        class="fab fa-facebook-square"></i></a></li>
                                            <li><a
                                                    href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                                        class="fab fa-instagram-square"></i></a></li>
                                            <li><a
                                                    href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                                        class="fab fa-twitter-square"></i></a></li>
                                            <li><a
                                                    href="https://www.insidethediv.com/responsive-dropdown-menu-with-submenu"><i
                                                        class="fab fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4 class="footer-widget-title liq-main-color footer-four-col">Stay Updated</h4>
                                    <div class="input-group input-group mb-3 ">
                                        <input type="text" class="form-control" placeholder="Enter your email"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append"><button class="btn btn-footer-main "
                                                type="button" id="button-addon2"><i class="fa fa-paper-plane"
                                                    aria-hidden="true"></i></button></div>
                                    </div>
                                    <!-- end /.footer-menu -->
                                </div>
                                <!-- Ends: .footer-widget -->
                            </div>
                            <!-- Ends: .col-lg-3 -->

                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.container -->
                </div>
                <!-- end /.footer-big -->
                <div class="mini-footer">
                    <div class="container-fluid footer-copyright">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright-text">
                                    <p>© 2023
                                        Clobe by <a href="#">Miracle Cosmatics</a>
                                    </p>
                                </div>

                                <div id="button_gotop" class="go_top">
                                    <i class="fa fa-chevron-up"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </footer>

        <div class="cookie-notice"><span class="cookie">🍪</span>
            <p style="margin-top: revert;">We are using Cookies! For more information visit this page&nbsp;<a
                    href="#">Cookie policy</a>.</p> <a type="button" href="{{ route('setcookies') }}"
                class="btn btn-footer-main ">OK</a>
        </div>


    </div>
</body>
<script>
    function openPortfolioTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    function CookiesCheck() {
        $.ajax({
            url: '{{ route('getcookies') }}',
            method: "get",
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {

                if (response != null) {
                    console.log(response);
                    $('.cookie-notice').css('display', 'none');
                }
            }
        });

    }

    // Get the element with id="defaultOpen" and click on it
    // document.getElementById("defaultOpen").click();
    var btn = $('#button_gotop');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

    function MoveSite(params) {
        location.href = params;
    }


    window.onscroll = function() {
        sticky_down();
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function sticky_down() {
        // console.log(window.pageYOffset);
        if (window.pageYOffset != sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }


    $(document).ready(function() {

        var pathname = window.location.pathname;
        someVariable = pathname.replace('/', '');

        if (someVariable == '' || someVariable == 'login-register') {
            if ($('#collapsingNavbar').hasClass("active")) {
                $('#collapsingNavbar').removeClass('active');
            }
            $('.homePage').addClass('active');
            $('#section_slag').css("display", "none");
        }
        if (someVariable == 'about') {
            if ($('#collapsingNavbar').hasClass("active")) {
                $('#collapsingNavbar').removeClass('active');
            }
            $('.aboutPage').addClass('active');
            $('#location_slag_head').append('<b>About</b> us');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>About</b> us');
        }
        if (someVariable == 'miraclebarsolutions') {
            $('#location_slag_head').append('<b>360° miracle</b> Solutions');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>360° miracle & Bar</b> Solutions'
            );
        }

        if (someVariable == 'miracleacademy') {
            $('#location_slag_head').append('<b>miracle</b> Academy');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>miracle</b> Academy');
        }
        if (someVariable == 'miraclesource') {
            $('#location_slag_head').append('<b>miracle</b> Source');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>miracle</b> Source');
        }
        if (someVariable == 'miracleaccessories') {
            $('#location_slag_head').append('<b>miracle</b> Accessories');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>miracle</b> Accessories');
        }

        if (someVariable == 'blog') {
            $('#location_slag_head').append('<b>miracle</b> Blog');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>miracle</b> Blog');
        }

        if (someVariable == 'news-event') {
            $('#location_slag_head').append('<b>News</b> & Events');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>News</b> & Events');
        }

        if (someVariable == 'our-partners') {
            $('#location_slag_head').append('<b>Our</b> Partners');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>Our</b> Partners');
        }

        if (someVariable == 'shop') {
            $('#location_slag_head').append('<b>Miracle</b> Shop');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>Miracle</b> Shop');
        }

        if (someVariable == 'offers') {
            $('#location_slag_head').append('<b>Offers</b>');
            $('#location_slag_body').append(
                '<a href="/" style="color:#006738; font-weight:500;">Home</a> | <b>Offers</b>');
        }


    });






    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var id = $(this).attr('product_id');
        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

    });


    var QtyInput = (function() {
        var $qtyInputs = $(".qty-input");

        if (!$qtyInputs.length) {
            return;
        }

        var $inputs = $qtyInputs.find(".product-qty");
        var $countBtn = $qtyInputs.find(".qty-count");
        var qtyMin = parseInt($inputs.attr("min"));
        var qtyMax = parseInt($inputs.attr("max"));

        $inputs.change(function() {
            var $this = $(this);
            var $minusBtn = $this.siblings(".qty-count--minus");
            var $addBtn = $this.siblings(".qty-count--add");
            var qty = parseInt($this.val());


            if (isNaN(qty) || qty <= qtyMin) {
                $this.val(qtyMin);
                $minusBtn.attr("disabled", true);
            } else {
                $minusBtn.attr("disabled", false);

                if (qty >= qtyMax) {
                    $this.val(qtyMax);
                    $addBtn.attr('disabled', true);
                } else {
                    $this.val(qty);
                    $addBtn.attr('disabled', false);
                }
            }
        });

        $countBtn.click(function() {
            var operator = this.dataset.action;
            var $this = $(this);
            var $input = $this.siblings(".product-qty");
            var qty = parseInt($input.val());

            if (operator == "add") {
                qty += 1;
                if (qty >= qtyMin + 1) {
                    $this.siblings(".qty-count--minus").attr("disabled", false);
                }

                if (qty >= qtyMax) {
                    $this.attr("disabled", true);
                }
            } else {
                qty = qty <= qtyMin ? qtyMin : (qty -= 1);

                if (qty == qtyMin) {
                    $this.attr("disabled", true);
                }

                if (qty < qtyMax) {
                    $this.siblings(".qty-count--add").attr("disabled", false);
                }
            }

            $input.val(qty);
            var id = $this.attr('product_id');
            // console.log($this);
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: qty
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    })();


    var textCatSearch;
    $(".default_option").click(function() {
        $(".dropdown ul").addClass("active");
    });

    $(".dropdown ul li").click(function() {
        textCatSearch = $(this).text();
        $(".default_option").text(textCatSearch);
        $(".dropdown ul").removeClass("active");
    });
    $(document).ready(function() {
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
    });

    function searchBox() {
        window.location.replace("/search");
    }
</script>

<script>
    // auto generated side menu from top header menu start
    var topHeaderMenu = $('header nav > ul').clone();
    var sideMenu = $('.side-menu-wrap nav');
    sideMenu.append(topHeaderMenu);
    if ($(sideMenu).find('.sub-menu').length != 0) {
        $(sideMenu).find('.sub-menu').parent().append('<i class="fas fa-plus d-flex align-items-center"></i>');
    }
    // auto generated side menu from top header menu end

    // close menu when clicked on menu link start
    // $('.side-menu-wrap nav > ul > li > a').on('click', function () {
    //   sideMenuCloseAction();
    // });
    // close menu when clicked on menu link end

    // open close sub menu of side menu start
    var sideMenuList = $('.side-menu-wrap nav > ul > li > i');
    $(sideMenuList).on('click', function() {
        if (!($(this).siblings('.sub-menu').hasClass('d-block'))) {
            $(this).siblings('.sub-menu').addClass('d-block');
        } else {
            $(this).siblings('.sub-menu').removeClass('d-block');
        }
    });
    // open close sub menu of side menu end

    // side menu close start
    $('.side-menu-close').on('click', function() {
        if (!($('.side-menu-close').hasClass('closed'))) {
            $('.side-menu-close').addClass('closed');
        } else {
            $('.side-menu-close').removeClass('closed');
        }
    });
    // side menu close end

    // auto append overlay to body start
    $('.wrapper').append('<div class="custom-overlay h-100 w-100"></div>');
    // auto append overlay to body end

    // open side menu when clicked on menu button start
    $('.side-menu-close').on('click', function() {
        if (!($('.side-menu-wrap').hasClass('opened')) && !($('.custom-overlay').hasClass('show'))) {
            $('.side-menu-wrap').addClass('opened');
            $('.custom-overlay').addClass('show');
        } else {
            $('.side-menu-wrap').removeClass('opened');
            $('.custom-overlay').removeClass('show');
        }
    })
    // open side menu when clicked on menu button end

    // close side menu when clicked on overlay start
    $('.custom-overlay').on('click', function() {
        sideMenuCloseAction();
    });
    // close side menu when clicked on overlay end

    // close side menu when swiped start
    var isDragging = false,
        initialOffset = 0,
        finalOffset = 0;
    $(".side-menu-wrap")
        .mousedown(function(e) {
            isDragging = false;
            initialOffset = e.offsetX;
        })
        .mousemove(function() {
            isDragging = true;
        })
        .mouseup(function(e) {
            var wasDragging = isDragging;
            isDragging = false;
            finalOffset = e.offsetX;
            if (wasDragging) {
                if (initialOffset > finalOffset) {
                    sideMenuCloseAction();
                }
            }
        });
    // close side menu when swiped end


    function sideMenuCloseAction() {
        $('.side-menu-wrap').addClass('open');
        $('.wrapper').addClass('freeze');
        $('.custom-overlay').removeClass('show');
        $('.side-menu-wrap').removeClass('opened');
        $('.side-menu-close').removeClass('closed');
        $(sideMenuList).siblings('.sub-menu').removeClass('d-block');
    }
    // close side menu when clicked on overlay end

    // close side menu over 992px start
    $(window).on('resize', function() {
        if ($(window).width() >= 992) {
            sideMenuCloseAction();
        }
    })
    // close side menu over 992px end

    $(document).ready(preloderFunction());



    function preloderFunction() {

        setTimeout(function() {

            // Force Main page to show from the Start(Top) even if user scroll down on preloader - Primary (Before showing content)

            // Model 1 - Fast            
            document.getElementById("page-top").scrollIntoView();

            // Model 2 - Smooth             
            // document.getElementById("page-top").scrollIntoView({behavior: 'smooth'});




            // Removing Preloader:

            $('#ctn-preloader').addClass('loaded');
            // Once the preloader has finished, the scroll appears 
            $('body').removeClass('no-scroll-y');

            if ($('#ctn-preloader').hasClass('loaded')) {
                // It is so that once the preloader is gone, the entire preloader section will removed
                $('#preloader').delay(1000).queue(function() {
                    $(this).remove();

                    // If you want to do something after removing preloader:
                    afterLoad();

                });
            }
            CookiesCheck();
        }, 3000);
    }



    function afterLoad() {
        // After Load function body!
    }


    $(document).ready(function() {
        openPortfolioTab(event, 'Skin-Care');
    });

    $('#navbarLandings').mouseover(function() {
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById('Skin-Care').style.display = "block";
        $('#Skin-Care').addClass("active");
    });

    //Code by ARiyou2000
</script>

</html>
