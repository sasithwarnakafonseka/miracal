@extends('website.layout.app')
@section('title')
    About Us
@endsection
@section('content')
    <main role="main">
        <!-- Our Story Start -->
        <div class="container-fluid about-us-container">
            <div class="row">
                <div class="col-md-6"><img class="img-about-us" src="\static\banner-image-2qqwwert.JPG"></div>
                <div class="col-md-6 about-miracle-bar">
                    <h1><br><strong class="about-strong-title">Our</strong> Story<br><br>
                    </h1>
                    <p>But I must explain to you how all this mistaken
                        idea of denouncing pleasure and
                        praising pain was born and I will give you. Sed laoreet massa a feugiat dictum. Cras ac tempor
                        justo, vel pellentesque felis. Praesent eget arcu quis arcu fringilla convallis.</p>
                    <p>Quisque iaculis dictum consectetur. Donec leo
                        ipsum, imperdiet et volutpat pretium,
                        maximus sed dolor. Donec rhoncus urna quis lacus volutpat, in consequat magna rhoncus. Fusce at
                        tincidunt velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                        vcurae one.
                    </p>
                    <p>Nunc non libero rutrum, placerat mauris vitae,
                        eleifend dui.The winemaker was born
                        and grew up in Sevastopol city, then studied in St. Petersburg city and Moscow citterroir
                        characteristics and uniqueness in every bottle.</p>
                </div>
            </div>
        </div>
        <!-- Our Story End    -->


        <!-- miracle Portfolio start -->
        <div class="container-fluid about-us-container">
            <div class="row miracle-portfolio-row">
                <div class="col-md-12">
                    <h1 style=""><strong class="about-strong-title">Miracle </strong>Portfolio</h1><br>
                    <p>But I
                        must explain to you how all this mistaken idea of denouncing pleasure and
                        praising pain was born and I will give you. Sed laoreet massa a feugiat dictum. Cras ac tempor
                        justo, vel pellentesque felis. Praesent eget arcu quis arcu fringilla convallis.
                        Quisque iaculis dictum consectetur. Donec leo ipsum, imperdiet et volutpat pretium, maximus sed
                        dolor. Donec rhoncus urna quis lacus volutpat, in consequat magna rhoncus. Fusce at tincidunt velit.
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia vcurae one.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><img class="img-miracle-portfolio" src="\static\aboutbg1.JPG">
                </div>
                <div class="col-md-4"><img class="img-miracle-portfolio"
                        src="\static\jonathan-gaitan-4Ivk6V6QBZI-unsplash.jpg">
                </div>
                <div class="col-md-4"><img class="img-miracle-portfolio" src="\static\aboutbd3.JPG">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><img class="img-miracle-portfolio" src="\static\aboutbg4.JPG">
                </div>
                <div class="col-md-4"><img class="img-miracle-portfolio" src="\static\aboutbg5.JPG">
                </div>
                <div class="col-md-4"><img class="img-miracle-portfolio" src="\static\aboutbg6.JPG">
                </div>
            </div>
        </div>
        <!-- miracle Portfolio end -->


        {{-- miracle Academy Start --}}
        <div class="container-fluid about-us-container">
            <div class="row">
                <div class="col-md-6 about-miracle-bar-content-right">
                    <h1><strong class="about-strong-title">Miracle</strong> Academy<br><br></h1>
                    <p>But I must explain to you how all this mistaken
                        idea of denouncing pleasure and
                        praising pain was born and I will give you. Sed laoreet massa a feugiat dictum. Cras ac tempor
                        justo, vel pellentesque felis. Praesent eget arcu quis arcu fringilla convallis.</p>
                    <p>Quisque iaculis dictum consectetur. Donec leo
                        ipsum, imperdiet et volutpat pretium,
                        maximus sed dolor. Donec rhoncus urna quis lacus volutpat, in consequat magna rhoncus. Fusce at
                        tincidunt velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                        vcurae one.
                    </p>
                    <p>Nunc non libero rutrum, placerat mauris vitae,
                        eleifend dui.The winemaker was born
                        and grew up in Sevastopol city, then studied in St. Petersburg city and Moscow citterroir
                        characteristics and uniqueness in every bottle.</p>
                </div>
                <div class="col-md-6"><img class="img-about-us about-pg-mobile-img"
                        src="\static\pexels-tim-douglas-6205532.jpg"></div>
            </div>
        </div>
        {{-- miracle Academy End --}}


        <!-- Our Team Start -->
        @if (count($teamMem) > 0)
            <div class="container-fluid about-pg-team-container">
                <div class="row about-our-team-row">
                    <div class="col-md-12 about-pg-team">
                        <h1>
                            <strong class="about-strong-title">Our&nbsp;</strong>Team<br>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    @foreach ($teamMem as $teamMemitem)
                        <div class="col-md-4 col-lg-3 item about-pg-team-item">
                            <div class="box about-pg-team-box"
                                style="background-image:url(/storage/{{ $teamMemitem->img }})">
                                <div class="cover">
                                    <div class="social about-team-social">
                                        @if ($teamMemitem->linkdin_link != null)
                                            <a href="{{ $teamMemitem->linkdin_link }}" target="_blank"><i
                                                    class="fab fa-linkedin"></i></a>
                                        @endif
                                        <a href="#" target="_blank"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h1 class="about-meet-our-team-name"><strong>{{ $teamMemitem->name }} </strong></h1>
                                <h1 class="about-meet-our-team-position">{{ $teamMemitem->role }}</h1>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
        </section>
    @endsection
