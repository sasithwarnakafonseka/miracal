@extends('website.layout.app')
@section('title') miracle Partners @endsection
@section('content')
    <main role="main">
        <div class="container-fluid text-left our-partner-pg">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="our-partner-pg-title">
                        <strong style="font-weight: 700;">Our Partners</strong>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="our-partner-pg-text"><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and scrambled it to make a type specimen book. It has survived not only five centuries, but
                        also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum
                        is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br><br></p>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5 our-partner-pg">
            <div class="filter filter-our-partners-pg">
                <a class="all current" href="#">All</a>
                <a class="Wines" href="#">Wines</a>
                <a class="Spirits" href="#">Spirits</a>
                <a class="Bubbles" href="#">Bubbles</a>
                <a class="Beer" href="#">Beer</a>
                <a class="Sake" href="#">Sake</a>
                <a class="Liqueurs" href="#">Liqueurs</a>
                <a class="Non-Alcoholic" href="#">Non-Alcoholic</a>
                <a class="miracle-Accessories" href="#">miracle Accessories</a>
            </div>

            <hr class="our-partner-pg-divider">

            <div class="boxGroup">

                @foreach ($partners as $partnerstem)
                    <a target="_blank" href="{{ $partnerstem->url }}">
                        @php
                            $cssClass = DB::table('partners_offering')
                                ->where('id_partner', $partnerstem->id)
                                ->get();
                        @endphp
                        <div class="box @foreach ($cssClass as $cssClassItems) {{ $cssClassItems->name_offering }} @endforeach"><img
                             width="125px" class="our-partner-pg-img"  src="/storage/{{ $partnerstem->logo }}" alt=""></div>
                    </a>
                @endforeach

            </div>
        </div>

    </main>


    <script>
        $(function() {

            var $filter = $('.filter');
            var $tab = $('.filter a');
            var $offers = $('.boxGroup .box')



            $filter.on('click touch', '.all', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.hide();
                $offers.fadeIn(700);

            });


            $filter.on('click touch', '.Wines', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Wines').fadeIn(400);

            });



            $filter.on('click touch', '.Spirits', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Spirits').fadeIn(400);

            });



            $filter.on('click touch', '.Bubbles', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Bubbles').fadeIn(400);

            });

            $filter.on('click touch', '.Beer', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Beer').fadeIn(400);

            });

            $filter.on('click touch', '.Sake', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Sake').fadeIn(400);

            });

            $filter.on('click touch', '.Liqueurs', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Liqueurs').fadeIn(400);

            });


            $filter.on('click touch', '.Non-Alcoholic', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.Non-Alcoholic').fadeIn(400);

            });

            $filter.on('click touch', '.miracle-Accessories', function(e) {
                e.preventDefault();
                $tab.removeClass('current');
                $(this).addClass('current');

                $offers.show();
                $offers.fadeOut(400);
                $offers.filter('.miracle-Accessories').fadeIn(400);

            });

        });
    </script>

@endsection
