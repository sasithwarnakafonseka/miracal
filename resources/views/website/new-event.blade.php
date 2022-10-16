@extends('website.layout.app')
@section('title') miracle News & Events @endsection
@section('content')
    <main role="main">
        {{-- <div class="container">
    <div class="row">
        <div class="col-10 text-left">
            
        </div>
        <div class="col-2 text-right">
        <div class="text-right">Sort by</div>
            <select name="" id="">
                <option value="">All Events</option>
                <option value="">Up Comming Events</option>
                <option value="">Compled Events</option>
            </select>
        </div>
    </div>
    </div> --}}
        <div class="cont">
            <hr class="mt-3 mb-3 news-events-divider" />
            <div class="container-news">
                @foreach ($news_event as $news_eventitem)

                    <div class="single-item">
                        <div class="container-fluid">
                            <div class="row news-events-pg-row">
                                <div class="col-md-4 col-lg-2 news-events-day-text">
                                    <h1 class="news-events-day">
                                        {{ \Carbon\Carbon::parse($news_eventitem->date_end)->format('l') }}</h1>
                                    <h1 class="news-events-day-num">
                                        {{ \Carbon\Carbon::parse($news_eventitem->date_end)->format('j') }}</h1>
                                </div>
                                <div class="col-md-4 col-lg-6 news-events-content">
                                    <h1 class="news-events-day">
                                        {{ \Carbon\Carbon::parse($news_eventitem->date)->format('F j Y') }} -
                                        {{ \Carbon\Carbon::parse($news_eventitem->date_end)->format('F j Y') }}</h1>
                                    <h1 class="news-events-content-title">{{ $news_eventitem->title }}
                                    </h1>
                                    <p class="news-events-content-text">
                                        {{ $news_eventitem->short_des }}
                                        <br>
                                        <a class="news-card-link" href="/news-event/single/{{ $news_eventitem->id }}">Read
                                            More....</a>
                                    </p>

                                    {{-- <p class="news-card-price">

                                    </p> --}}

                                </div>
                                <div class="col-md-4 col-lg-4 img-news-events-right"><img class="news-events-right-img"
                                        src="/storage/{{ $news_eventitem->img }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        <script>
            (function($) {
                var pagify = {
                    items: {},
                    container: null,
                    totalPages: 1,
                    perPage: 3,
                    currentPage: 0,
                    createNavigation: function() {
                        this.totalPages = Math.ceil(this.items.length / this.perPage);

                        $('.pagination', this.container.parent()).remove();
                        var pagination = $('<div class="pagination"></div>').append(
                            '<a class="nav prev disabled" data-next="false"><</a>');

                        for (var i = 0; i < this.totalPages; i++) {
                            var pageElClass = "page";
                            if (!i)
                                pageElClass = "page current";
                            var pageEl = '<a class="' + pageElClass + '" data-page="' + (
                                i + 1) + '">' + (
                                i + 1) + "</a>";
                            pagination.append(pageEl);
                        }
                        pagination.append('<a class="nav next" data-next="true">></a>');

                        this.container.after(pagination);

                        var that = this;
                        $("body").off("click", ".nav");
                        this.navigator = $("body").on("click", ".nav", function() {
                            var el = $(this);
                            that.navigate(el.data("next"));
                        });

                        $("body").off("click", ".page");
                        this.pageNavigator = $("body").on("click", ".page", function() {
                            var el = $(this);
                            that.goToPage(el.data("page"));
                        });
                    },
                    navigate: function(next) {
                        // default perPage to 5
                        if (isNaN(next) || next === undefined) {
                            next = true;
                        }
                        $(".pagination .nav").removeClass("disabled");
                        if (next) {
                            this.currentPage++;
                            if (this.currentPage > (this.totalPages - 1))
                                this.currentPage = (this.totalPages - 1);
                            if (this.currentPage == (this.totalPages - 1))
                                $(".pagination .nav.next").addClass("disabled");
                        } else {
                            this.currentPage--;
                            if (this.currentPage < 0)
                                this.currentPage = 0;
                            if (this.currentPage == 0)
                                $(".pagination .nav.prev").addClass("disabled");
                        }

                        this.showItems();
                    },
                    updateNavigation: function() {

                        var pages = $(".pagination .page");
                        pages.removeClass("current");
                        $('.pagination .page[data-page="' + (
                            this.currentPage + 1) + '"]').addClass("current");
                    },
                    goToPage: function(page) {

                        this.currentPage = page - 1;

                        $(".pagination .nav").removeClass("disabled");
                        if (this.currentPage == (this.totalPages - 1))
                            $(".pagination .nav.next").addClass("disabled");

                        if (this.currentPage == 0)
                            $(".pagination .nav.prev").addClass("disabled");
                        this.showItems();
                    },
                    showItems: function() {
                        this.items.hide();
                        var base = this.perPage * this.currentPage;
                        this.items.slice(base, base + this.perPage).show();

                        this.updateNavigation();
                    },
                    init: function(container, items, perPage) {
                        this.container = container;
                        this.currentPage = 0;
                        this.totalPages = 1;
                        this.perPage = perPage;
                        this.items = items;
                        this.createNavigation();
                        this.showItems();
                    }
                };

                // stuff it all into a jQuery method!
                $.fn.pagify = function(perPage, itemSelector) {
                    var el = $(this);
                    var items = $(itemSelector, el);

                    // default perPage to 5
                    if (isNaN(perPage) || perPage === undefined) {
                        perPage = 3;
                    }

                    // don't fire if fewer items than perPage
                    if (items.length <= perPage) {
                        return true;
                    }

                    pagify.init(el, items, perPage);
                };
            })(jQuery);

            $(".container-news").pagify(6, ".single-item");
        </script>
    @endsection
