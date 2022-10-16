@extends('website.layout.app')
@section('title') miracle Academy @endsection
@section('content')
    <main role="main">
        <div class="container content-width">
            <div class="row miracle-bar-solution">
                <div class="col-md-12">
                    <h1><strong class="text-strong-size">miracle</strong> Academy<br></h1>
                    <h2><span style="color: #000">By</span> Admin<br></h2>
                </div>
            </div>
            <div class="row miracle-bar-solution-content">
                <div class="col-md-6">

                    <p><br>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and scrambled it to make a type specimen book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and scrambled it to make a type specimen book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br><br>
                    </p>
                </div>
                <div class="col-md-6">
                    <p><br>Lorem Ipsum is simply dummy text of the printing
                        and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
                        not only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                        Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.<br><br><br></p>
                </div>
            </div>
        </div>
        <div class="container content-width">
            <div class="row we-offering">
                <div class="col-md-12">
                    <h1><strong class="text-strong-size">We</strong> Offer</h1>
                </div>
            </div>
            <div class="row we-offering-title">

                <div id="we_offer" class="owl-carousel owl-theme">

                    @foreach ($MainBanneritemSub_footer as $MainBanneritemSub_footeritem)

                        <div class="item">
                            <img class="img-we-offering" src="/storage/{{ $MainBanneritemSub_footeritem->img }}"><br>
                            <h1>{{ $MainBanneritemSub_footeritem->title }}</h1><br>
                            <p>{{ $MainBanneritemSub_footeritem->text }}<br></p>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row bottom-contact-us">
                <div class="col-md-12">
                    <h1><strong class="contact-text-strong-size">Contact</strong> Us</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 bottom-contact-us-content"></div>
                <div class="col-md-6 bottom-contact-us-content">
                    <p><br>e-mail: info@themiracleconcept.com<br>Telephone: +960
                        9975933<br>www.miracleaconcept.com<br><br></p>
                </div>
                <div class="col-md-3 bottom-contact-us-content"></div>
            </div>
        </div>
        <script>
            $('#we_offer').owlCarousel({
                nav: true,
                loop: true,
                dots: false,
                margin: 10,
                stagePadding: 10,
                navText: [
                    "<div class='nav-btn prev-slide we-offering-prev-slide'><img style='' src='/static/Untitled_design_previous-removebg-preview.png'/></div>",
                    "<div class='nav-btn next-slide we-offering-next-slide'><img style='' src='/static/Untitled_design_next-removebg-preview.png'/></div>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },
            });
        </script>
        <style>
            .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled{
                display: block;
            }
        </style>
    @endsection
