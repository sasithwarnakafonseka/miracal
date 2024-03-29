@extends('website.layout.app')
@section('title')
    Home
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style-lower.css">
    <link rel="stylesheet" type="text/css" href="css/slider-ghn.css">

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <main role="main">

        <!-- Set up your HTML -->
        <!-- Set up your HTML -->

        <!-- Hero Slider -->
        @if (count($MainBanners) > 0)
            <section id="home" class="hero-slider owl-carousel owl-theme">
                @foreach ($MainBanners as $MainBanneritem)
                    <div style="background-image:url(/storage/{{ $MainBanneritem->img }}); max-width:initial; background-repeat: no-repeat;"
                        class="single-hs-item">
                        {{-- <div class="db-table">
                            <div class="d-tablecell">
                                <div class="hero-text">
                                    @if ($MainBanneritem->title_color != null)
                                        <h1 style="color:{{ $MainBanneritem->title_color }}">{{ $MainBanneritem->title }}
                                        </h1>
                                    @endif
                                    @if ($MainBanneritem->text_color != null)
                                        <p style="color:{{ $MainBanneritem->text_color }}">{{ $MainBanneritem->text }}</p>
                                    @endif
                                    @if ($MainBanneritem->button_text != null)
                                        <div class="slider-btn">
                                            <a href="#" class="btn btn-liq-main-slider "
                                                style="background-color:{{ $MainBanneritem->button_color }};color:{{ $MainBanneritem->button_text_color }}">{{ $MainBanneritem->button_text }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                    </div>
                @endforeach

            </section>
        @endif
        <!-- End Hero Slider -->

        <!-- Image Slider End -->


        <!-- miracle Expertise start -->

        <section class="newArrivals section">
            <div class="miracle-expertise">
                <div class="index-content">
                    <div class="row" style="margin-left: 0px; margin-right: 0px">
                        <div class="col-md-4">
                            <div class="card car-no-boarder card-miracle-expertise">
                                <img class="index-content-card-img" src="\global_assets\images\card-banners\card1.png">
                                <div class="image-overlay image-overlay-black">
                                    <h3 style="margin-left: 20px">SKIN CARE</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a class="btn">Shop More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card car-no-boarder card-miracle-expertise">
                                <img class="index-content-card-img" src="\global_assets\images\card-banners\card2.png">
                                <div class="image-overlay image-overlay-white">
                                    <h3 style="margin-left: 20px">HAIR CARE</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a class="btn">Shop More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card car-no-boarder card-miracle-expertise">
                                <img class="index-content-card-img" src="\global_assets\images\card-banners\card3.png">
                                <div class="image-overlay image-overlay-black">
                                    <h3 style="margin-left: 20px">PHARMACEUTICAL</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a class="btn">Shop More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- miracle Expertise end -->


        <!-- Image Slider Start -->


        @if (count($latestProducts) > 0)
            <section class="newArrivals section" style="background: #F78FB3;padding-bottom: 80px;">
                <div class="container">
                    <div class="row best-sellers-slider" style="margin-left: 0px; margin-right: 0px">
                        <div class="col-md-12 text-center section-heading">
                            <h1 style="color:#fff"><strong style="color:#fff class="strong-hm-sc-title">NEW
                                    &nbsp;</strong>ARRIVALS</h1>
                            <p style="color:#fff">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                                consectetur eu cum aliquam
                                diam cras aenean et. Pharetra, dignissim velitLorem ipsum dolor sit amet, </p>
                        </div>
                    </div>


                    <div class="cards-wrapper-gh-ws">

                        <div class="blog-slider"
                            style="background-image: linear-gradient(147deg, #DC5480 0%, #8EA3E2 150%);">
                            <div class="blog-slider__wrp swiper-wrapper">
                                @foreach ($latestProducts as $latestProduct)
                                    @php
                                        $UrlNmae = str_replace('/', '-', $latestProduct->name);
                                    @endphp
                                    <div class="blog-slider__item swiper-slide">
                                        <div class="blog-slider__img">

                                            @if ($latestProduct->Image_Product_thumbnail_image_best_seller != null)
                                                <img
                                                    src="/storage/{{ $latestProduct->Image_Product_thumbnail_image_best_seller }}">
                                            @else
                                                <img src="\static\Image-2-1.jpg" />
                                            @endif
                                        </div>
                                        <div class="blog-slider__content">
                                            <span
                                                class="blog-slider__code">{{ $latestProduct->created_at->format('Y-M-d') }}</span>
                                            <div class="blog-slider__title">{{ $latestProduct->name }}</div>
                                            {{-- <div class="blog-slider__text">Lorem ipsum dolor sit amet consectetur,
                                                adipisicing
                                                elit.
                                                Recusandae voluptate repellendus magni illo ea animi? </div> --}}
                                            <a
                                                href="/shop/product/{{ $latestProduct->id }}/{{ $UrlNmae }}"class="blog-slider__button">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="blog-slider__pagination"></div>
                        </div>

                    </div>

                </div>
            </section>
        @endif

        <!-- PRE ORDER NEW COLLECTION start -->
        @if (count($OfferBanners) > 0)
            <section class="newArrivals section">
                <div class="container">
                    <div class="row best-sellers-slider" style="margin-left: 0px; margin-right: 0px">
                        <div class="col-md-12 text-center section-heading">
                            <h1><strong class="strong-hm-sc-title">NEW &nbsp;</strong>ARRIVALS</h1>
                            <p class="text-pre-order">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                                consectetur eu cum aliquam
                                diam cras aenean et. Pharetra, dignissim velitLorem ipsum dolor sit amet, </p>
                        </div>
                    </div>

                    <div class="offers-banner owl-carousel owl-theme">
                        @foreach ($OfferBanners as $OfferBannerItem)
                            <div class="item">
                                <div class="row new-collection-section" style="margin-left: 250px; margin-right: 250px">
                                    <div class="col-lg-4 new-collection-section-row"><img
                                            class="img-pre-order-new-collection" src="/storage/{{ $OfferBannerItem->img }}">
                                    </div>
                                    <div class="col-lg-8 new-collection">
                                        <h2>PRE ORDER NEW COLLECTION</h2>
                                        <h1 style="color:{{ $OfferBannerItem->title_color }}">
                                            {{ $OfferBannerItem->title }}</h1>

                                        <p style="color:{{ $OfferBannerItem->text_color }}">{{ $OfferBannerItem->text }}
                                        </p>
                                        <button class="btn btn-primary bds-button new-collection-button" type="button"
                                            style="background-color:{{ $OfferBannerItem->button_color }};color:{{ $OfferBannerItem->button_text_color }}">{{ $OfferBannerItem->button_text }}</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- PRE ORDER NEW COLLECTION end -->

        <!-- Best Sellers start -->
        @if (count($bestSell) > 0)
            <section class="bestSell section">
                <div class="container">
                    <div class="row best-sellers-slider" style="margin-left: 0px; margin-right: 0px">
                        <div class="col-md-12 text-center section-heading">
                            <h1><strong class="strong-hm-sc-title">DEALS &nbsp;</strong>OF THE WEEK</h1>
                        </div>
                    </div>

                    <div id="best-sellers-slider" class="best-sellers-banner owl-carousel owl-theme">
                        @foreach ($bestSell as $bestSellitem)
                            @php
                                $UrlNmae = str_replace('/', '-', $bestSellitem->name);
                            @endphp

                            <div class="item card-product" style="">
                                <div class="text-center">
                                    @if ($bestSellitem->Image_Product_thumbnail_image_best_seller != null)
                                        <img src="/storage/{{ $bestSellitem->Image_Product_thumbnail_image_best_seller }}">
                                    @else
                                        <img src="\static\Image-2-1.jpg" />
                                    @endif

                                    <h6 class="img-miracle-bestseller-text">{{ $bestSellitem->name }}</h6>
                                    <p class="img-miracle-bestseller-text">
                                        LKR {{ $bestSellitem->g_regular_price }}</p>


                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/shop/product/{{ $bestSellitem->id }}/{{ $UrlNmae }}"><button
                                                    class="btn best-sellers-btn btn-outline" type="button">Buy
                                                    Now</button>
                                            </a>
                                        </div>
                                        <div class="col-6 pl-0">
                                            <a id="order_link" href="/add-to-cart?id={{ $bestSellitem->id }}&quantity=1">
                                                <button class="btn best-sellers-btn btn-outline-cart" type="button">Add
                                                    To
                                                    Cart</button></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Best Sellers end -->
        <!-- Wellcome start -->
        <section class="ads section">
            <div class="container">
                <div class="content-welcome">
                    <h2>WELCOME TO</h2>
                    <h1 class="heading-MR">MIRACLE BEAUTY FAMILY</h1>
                    <p class="text-MR">Miracle Beauty is a multi-level marketing beauty and health company selling directly
                        to consumers
                        founded
                        in 2022 and registered under ayurvedic department of Sri Lanka as an ayurvedic products
                        manufacturing
                        organization in 2020.</p>
                    <div class="read-more"><a><button class="btn btn-primary btn-miracle-blog"> READ MORE</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wellcome end -->

        <!-- Miracle presents start -->
        @if (count($PRESENTS['SKINCARE']) > 0 || count($PRESENTS['HAIRCARE']) > 0 || count($PRESENTS['PHARMACEUTICAL']) > 0)
            <section class="presents-sec section">
                <div class="row" style="margin-left: 0px; margin-right: 0px">
                    <div class="col-md-12 text-center section-heading">
                        <h1><strong class="strong-hm-sc-title">MIRACLE&nbsp;</strong>PRESENTS</h1>
                    </div>
                </div>
                <div class="container">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                @if (count($PRESENTS['SKINCARE']) > 0)
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab" class="active show">SKIN CARE</a>
                                    </li>
                                @endif
                                @if (count($PRESENTS['HAIRCARE']) > 0)
                                    <li>
                                        <a href="#tab_default_2" data-toggle="tab">HAIR CARE</a>
                                    </li>
                                @endif
                                @if (count($PRESENTS['PHARMACEUTICAL']) > 0)
                                    <li>
                                        <a href="#tab_default_3" data-toggle="tab">PHARMACEUTICAL</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                @if (count($PRESENTS['SKINCARE']) > 0)
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div id="best-sellers-slider " class="best-sellers-banner owl-carousel owl-theme">
                                            @foreach ($PRESENTS['SKINCARE'] as $item)
                                                @php
                                                    $UrlNmae1 = str_replace('/', '-', $item->name);
                                                @endphp

                                                <a href="/shop/product/{{ $item->id }}/{{ $UrlNmae1 }}">
                                                    <div class="item card-product" style="">
                                                        <div class="text-center">
                                                            @if ($item->Image_Product_thumbnail_image_best_seller != null)
                                                                <img
                                                                    src="/storage/{{ $item->Image_Product_thumbnail_image_best_seller }}">
                                                            @else
                                                                <img src="\static\Image-2-1.jpg" />
                                                            @endif

                                                            <h6 class="img-miracle-bestseller-text">{{ $item->name }}
                                                            </h6>
                                                            <p class="img-miracle-bestseller-text">
                                                                LKR {{ $item->g_regular_price }}</p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Buy Now</button>
                                                                </div>
                                                                <div class="col-6 pl-0">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Add To Cart</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if (count($PRESENTS['HAIRCARE']) > 0)
                                    <div class="tab-pane" id="tab_default_2">
                                        <div id="best-sellers-slider" class="best-sellers-banner owl-carousel owl-theme">
                                            @foreach ($PRESENTS['HAIRCARE'] as $item)
                                                @php
                                                    $UrlNmae2 = str_replace('/', '-', $item->name);
                                                @endphp
                                                <a href="/shop/product/{{ $item->id }}/{{ $UrlNmae2 }}">
                                                    <div class="item card-product" style="">
                                                        <div class="text-center">
                                                            @if ($item->Image_Product_thumbnail_image_best_seller != null)
                                                                <img
                                                                    src="/storage/{{ $item->Image_Product_thumbnail_image_best_seller }}">
                                                            @else
                                                                <img src="\static\Image-2-1.jpg" />
                                                            @endif

                                                            <h6 class="img-miracle-bestseller-text">
                                                                {{ $item->name }}</h6>

                                                            <p class="img-miracle-bestseller-text">
                                                                LKR {{ $item->g_regular_price }}</p>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Buy Now</button>
                                                                </div>
                                                                <div class="col-6 pl-0">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Add To Cart</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if (count($PRESENTS['PHARMACEUTICAL']) > 0)
                                    <div class="tab-pane" id="tab_default_3">
                                        <div id="best-sellers-slider" class="best-sellers-banner owl-carousel owl-theme">
                                            @foreach ($PRESENTS['PHARMACEUTICAL'] as $item)
                                                @php
                                                    $UrlNmae3 = str_replace('/', '-', $item->name);
                                                @endphp
                                                <a href="/shop/product/{{ $item->id }}/{{ $UrlNmae3 }}">
                                                    <div class="item card-product" style="">
                                                        <div class="text-center">
                                                            @if ($item->Image_Product_thumbnail_image_best_seller != null)
                                                                <img
                                                                    src="/storage/{{ $item->Image_Product_thumbnail_image_best_seller }}">
                                                            @else
                                                                <img src="\static\Image-2-1.jpg" />
                                                            @endif

                                                            <h6 class="img-miracle-bestseller-text">{{ $item->name }}
                                                            </h6>
                                                            <p class="img-miracle-bestseller-text">
                                                                LKR {{ $item->g_regular_price }}</p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Buy Now</button>
                                                                </div>
                                                                <div class="col-6 pl-0">
                                                                    <button class="btn best-sellers-btn btn-outline"
                                                                        type="button">Add To Cart</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>
            </section>
        @endif
        <!-- Wellcome end -->

        <!-- miracle NEWS & Events start -->
        <!-- @if (count($News_Events) > 0)
    <section class="details-card">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row miracle-news-events" style="margin-left: 0px; margin-right: 0px">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-12 text-center section-heading">
                                                                                                                                                                                                                                                                                                                                                                                                        <h1><strong class="strong-hm-sc-title">miracle News</strong> & Events</h1>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row miracle-news-events-align">
                                                                                                                                                                                                                                                                                                                                                                                                    @foreach ($News_Events as $News_Eventsitem)
    <div class="col-md-4 miracle-news-events-top-align">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="miracle-news-events-card-content">
                                                                                                                                                                                                                                                                                                                                                                                                                <div class="miracle-news-events-card-img">
                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="/storage/{{ $News_Eventsitem->img }}" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                <div class="miracle-news-events-card-desc">
                                                                                                                                                                                                                                                                                                                                                                                                                    <h3>{{ $News_Eventsitem->title }}</h3>
                                                                                                                                                                                                                                                                                                                                                                                                                    <p>{{ $News_Eventsitem->short_des }}</p> <a class="card-link"
                                                                                                                                                                                                                                                                                                                                                                                                                        href="/news-event/single/{{ $News_Eventsitem->id }}">Read
                                                                                                                                                                                                                                                                                                                                                                                                                        More....</a>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
    @endforeach
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <a href="/news-event"><button class="btn btn-primary btn-card-news-events" type="button">Discover
                                                                                                                                                                                                                                                                                                                                                                                                        More</button></a>
                                                                                                                                                                                                                                                                                                                                                                                            </section>
    @endif -->
        <!-- miracle NEWS & Events end -->

        <!-- Testimonial start -->
        <!-- @if (count($Testimonios) > 0)
    <section>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="container-fluid px-3 px-sm-5 my-5 text-center"
                                                                                                                                                                                                                                                                                                                                                                                                    style="background-image:url(/static/TESTIMOnnnnnnn.jpg); max-width:initial; background-repeat: no-repeat; background-size: cover;">
                                                                                                                                                                                                                                                                                                                                                                                                    <div id="Testimonios" class="owl-carousel owl-theme testi-crsl-section">
                                                                                                                                                                                                                                                                                                                                                                                                        @foreach ($Testimonios as $index => $Testimonios)
    @if ($index == 0)
    <div class="item first prev">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card border-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row justify-content-center"> <img src="\static\testimonial.JPG"
                                                                                                                                                                                                                                                                                                                                                                                                                                class="img-fluid profile-pic mb-4 mt-3"> </div>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-1 mt-2">{{ $Testimonios->name }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-3 font-weight-light">{{ $Testimonios->title }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <p class="content mb-5 mx-2">{{ $Testimonios->testimonio }}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
    @endif
                                                                                                                                                                                                                                                                                                                                                                                                            @if ($index == 1)
    <div class="item show">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card border-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row justify-content-center"> <img src="\static\testimonial.JPG"
                                                                                                                                                                                                                                                                                                                                                                                                                                class="img-fluid profile-pic mb-4 mt-3"> </div>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-1 mt-2">{{ $Testimonios->name }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-3  font-weight-light">{{ $Testimonios->title }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <p class="content mb-5 mx-2">{{ $Testimonios->testimonio }}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
    @endif
                                                                                                                                                                                                                                                                                                                                                                                                            @if ($index == 2)
    <div class="item next">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card border-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row justify-content-center"> <img src="\static\testimonial.JPG"
                                                                                                                                                                                                                                                                                                                                                                                                                                class="img-fluid profile-pic mb-4 mt-3"> </div>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-1 mt-2">{{ $Testimonios->name }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-3 font-weight-light">{{ $Testimonios->title }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <p class="content mb-5 mx-2">{{ $Testimonios->testimonio }}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
    @endif
                                                                                                                                                                                                                                                                                                                                                                                                            @if ($index == 3)
    <div class="item last">
                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="card border-0 py-3 px-4">
                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row justify-content-center"> <img src="\static\testimonial.JPG"
                                                                                                                                                                                                                                                                                                                                                                                                                                class="img-fluid profile-pic mb-4 mt-3"> </div>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-1 mt-2">{{ $Testimonios->name }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <h6 class="mb-3  font-weight-light">{{ $Testimonios->title }}</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                        <p class="content mb-5 mx-2">{{ $Testimonios->testimonio }}</p>
                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
    @endif
    @endforeach

                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </section>
    @endif -->


        <!-- Testimonial end -->
        <section class="make-money-with-sec section" style="margin-top: 50px;margin-bottom:150px">
            <!-- Earn with Miracle start-->
            <div class="container-fluid container-fluid-gh">
                <div class="row">

                    <div class="col-sm-7">
                        <div class="carousel">
                            <div class="carousel__container">
                                <input type="radio" id="img-1" name="images" value="img-1" />
                                <input type="radio" id="img-2" name="images" value="img-2" checked />
                                <input type="radio" id="img-3" name="images" value="img-3" />
                                <input type="radio" id="img-4" name="images" value="img-4" />
                                <input type="radio" id="img-5" name="images" value="img-5" />
                                <label class="carousel__img-container carousel__img-container--1" for="img-1"
                                    id="img-1">
                                    <img class="carousel__img"
                                        src="https://images.unsplash.com/photo-1500462918059-b1a0cb512f1d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80"
                                        alt="Colored room" />
                                </label>
                                <label class="carousel__img-container carousel__img-container--2" for="img-2"
                                    id="img-2">
                                    <img class="carousel__img"
                                        src="https://images.unsplash.com/photo-1485001564903-56e6a54d46ef?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="Colored room" />
                                </label>
                                <label class="carousel__img-container carousel__img-container--3" for="img-3"
                                    id="img-3">
                                    <img class="carousel__img"
                                        src="https://images.unsplash.com/photo-1563089145-599997674d42?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80"
                                        alt="Colored room" />
                                </label>
                                <label class="carousel__img-container carousel__img-container--4" for="img-4"
                                    id="img-4">
                                    <img class="carousel__img"
                                        src="https://images.unsplash.com/photo-1680798790002-a974b97b0eeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=389&q=80"
                                        alt="Colored room" />
                                </label>
                                <label class="carousel__img-container carousel__img-container--5" for="img-5"
                                    id="img-5">
                                    <img class="carousel__img"
                                        src="https://images.unsplash.com/photo-1680712738343-84ef33239b1c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=389&q=80"
                                        alt="Colored room" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 mt-5">
                        <h4>Make Money With </h4>
                        <h2>MIRACLE BEAUTY</h2>
                        <br>
                        <p class="para-2-gh" style="font-size: large;">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.</p>

                        <a href="/login-register"><button type="button"
                                class="btn btn-outline-dark">REGISTER</button></a>
                        <a href="/about"><button type="button" class="btn btn-outline-dark">READ MORE</button></a>
                    </div>

                </div>

            </div>
            <!-- Earn with Miracle End-->
        </section>

        <!-- miracle Blog start -->
        @if (count($Blog) > 0)
            <section class="miracle-blog-card">
                <div class="row miracle-blog" style="margin-left: 0px; margin-right: 0px">
                    <div class="col-md-12 text-center section-heading miracle-blog-sec-title">
                        <h1><strong class="strong-hm-sc-title">Miracle&nbsp;</strong>Blog</h1>
                    </div>
                </div>
                <div class="miracle-blog-card-align">
                    <div class="row">
                        @foreach ($Blog as $Blogitem)
                            <div class="col-md-4 miracle-blog-card-align-top">
                                <a class="miracle-blog-card-sec" href="/blog/single/{{ $Blogitem->id }}">
                                    <div class="miracle-blog-card-content">
                                        <div class="miracle-blog-card-img">
                                            <img src="/storage/{{ $Blogitem->img }}" alt="">
                                        </div>
                                        <div class="miracle-blog-card-desc">
                                            <h3 class="miracle-blog-card-title">{{ $Blogitem->title }}</h3>
                                            <p class="miracle-blog-card-text">{{ $Blogitem->short_des }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <a href="/blog">
                        <button class="btn btn-primary btn-miracle-blog" type="button">Learn More</button>
                    </a>
                </div>
            </section>
        @endif
        <!-- miracle Blog end -->

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script>
        // Hero slider JS
        $('.hero-slider').owlCarousel({
            // animateOut: 'slideOutDown',
            // animateIn: 'heartBeat',
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            // nav: true,
            dots: true,
        });

        $('.offers-banner').owlCarousel({
            loop: true,
            margin: 10,
            animateOut: 'fadeOut',
            items: 1,
        });

        $('.best-sellers-banner').owlCarousel({
            nav: true,
            loop: true,
            dots: false,
            navText: [
                "<div class='nav-btn prev-slide'><img style='width:inherit;  padding: 10px;vertical-align: baseline;' src='/static/Untitled_design_previous-removebg-preview.png'/></div>",
                "<div class='nav-btn next-slide'><img style='width:inherit;  padding: 10px;vertical-align: baseline;' src='/static/Untitled_design_next-removebg-preview.png'/></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            },
        });

        $("#testimonial-slider").owlCarousel({

            pagination: true,
            navigation: true,
            navigationText: ["", ""],
            slideSpeed: 1000,
            autoplayTimeout: 3000,
            autoPlay: true
        });
        // Code goes here

        document.documentElement.classList.add('js');

        /// ----------------------------

        const $rootSingle = $('.cSlider--single');
        const $rootNav = $('.cSlider--nav');

        $rootSingle.slick({
            slide: '.cSlider__item',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<div class="arr-back slide-arrow prev-arrow"><img style="width: inherit;" src="/static/next.png"/></div>',
            nextArrow: '<div class="arr-next slide-arrow next-arrow"><img style="width: inherit;" src="/static/pre.png"/></div>',
            fade: false,
            adaptiveHeight: true,
            infinite: true,
            useTransform: true,
            speed: 400,
            cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
        });

        $rootNav.on('init', function(event, slick) {
                $(this).find('.slick-slide.slick-current').addClass('is-active');
            })
            .slick({
                slide: '.cSlider__item',
                slidesToShow: 5,
                slidesToScroll: 5,
                arrows: false,
                margin: 10,
                centerPadding: '60px',
                centerMode: true,
                dots: false,
                focusOnSelect: false,
                infinite: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });

        $rootSingle.on('afterChange', function(event, slick, currentSlide) {
            $rootNav.slick('slickGoTo', currentSlide);
            $rootNav.find('.slick-slide.is-active').removeClass('is-active');
            $rootNav.find('.slick-slide[data-slick-index="' + currentSlide + '"]').addClass('is-active');
        });

        $rootNav.on('click', '.slick-slide', function(event) {
            event.preventDefault();
            var goToSingleSlide = $(this).data('slick-index');

            $rootSingle.slick('slickGoTo', goToSingleSlide);
        });
        $('.owl-carousel1').on('translate.owl.carousel', function(e) {
            idx = e.item.index;
            $('.owl-item.big').removeClass('big');
            $('.owl-item.medium').removeClass('medium');
            $('.owl-item').eq(idx).addClass('big');
            $('.owl-item').eq(idx - 1).addClass('medium');
            $('.owl-item').eq(idx + 1).addClass('medium');
        });


        $("#partner-carosel").owlCarousel({
            items: 5,
            itemsDesktop: [1000, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1],
            pagination: true,
            animateOut: 'fadeOut',
            navigation: true,
            navigationText: ["", ""],
            slideSpeed: 1000,
            autoplayTimeout: 3000,
            autoPlay: true
        });



        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        $('#slick1partners').slick({
            rows: 3,
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 5,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToScroll: 4,
        });

        $('#Testimonios').owlCarousel({
            mouseDrag: false,
            loop: true,
            dots: false,
            margin: 2,
            nav: true,
            navText: [

                '<div class="owl-prev-test"><img style="width: 50px;" src="/static/Untitled_design_previous-removebg-preview.png"/></div>',

                '<div class="owl-next-test"><img style="width: 50px;" src="/static/Untitled_design_next-removebg-preview.png"/></div>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });

        $('.owl-prev-test').click(function() {
            $active = $('.owl-item .item.show');
            $('.owl-item .item.show').removeClass('show');
            $('.owl-item .item').removeClass('next');
            $('.owl-item .item').removeClass('prev');
            $active.addClass('next');
            if ($active.is('.first')) {
                $('.owl-item .last').addClass('show');
                $('.first').addClass('next');
                $('.owl-item .last').parent().prev().children('.item').addClass('prev');
            } else {
                $active.parent().prev().children('.item').addClass('show');
                if ($active.parent().prev().children('.item').is('.first')) {
                    $('.owl-item .last').addClass('prev');
                } else {
                    $('.owl-item .show').parent().prev().children('.item').addClass('prev');
                }
            }
        });

        $('.owl-next-test').click(function() {
            $active = $('.owl-item .item.show');
            $('.owl-item .item.show').removeClass('show');
            $('.owl-item .item').removeClass('next');
            $('.owl-item .item').removeClass('prev');
            $active.addClass('prev');
            if ($active.is('.last')) {
                $('.owl-item .first').addClass('show');
                $('.owl-item .first').parent().next().children('.item').addClass('prev');
            } else {
                $active.parent().next().children('.item').addClass('show');
                if ($active.parent().next().children('.item').is('.last')) {
                    $('.owl-item .first').addClass('next');
                } else {
                    $('.owl-item .show').parent().next().children('.item').addClass('next');
                }
            }
        });

        $(".tabContent").hide();
        $("ul.tabs li:first").addClass("active").show();
        $(".tabContent:first").show();

        $("ul.tabs li").click(function() {
            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");
            $(".tabContent").hide();
            var activeTab = $(this).find("a").attr("href");
            $(activeTab).fadeIn();
            return false;
        });

        var swiper = new Swiper('.blog-slider', {
            spaceBetween: 30,
            effect: 'fade',
            loop: false,
            mousewheel: {
                invert: false,
            },
            // autoHeight: true,
            pagination: {
                el: '.blog-slider__pagination',
                clickable: true,
            }
        });
    </script>


    {{-- <script src="./js/index.js"></script> --}}
    <script src="js/earn-carousel.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


@endsection
