@extends('website.layout.app')
@section('title')
    {{ $productDetails->name }}
@endsection

@section('content')
    <style>
        /* product page  */

        .content-carousel {
            width: 500px;
            display: block;
            margin: 0 auto;
        }

        .owl-carousel {
            width: calc(100% - 75px);
        }

        .owl-carousel div {
            width: 100%;
        }

        .owl-carousel .owl-controls .owl-dot {
            background-size: cover;
            margin-top: 10px;
        }

        .owl-carousel .owl-dots {
            position: absolute;
            top: 0;
            left: -75px;
            width: 70px;
            height: 100%;
        }

        .owl-carousel .owl-nav button.owl-next,
        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel button.owl-dot {
            width: 100px;
        }

        .owl-carousel .owl-stage-outer {
            margin-left: 40px;
        }

        .owl-carousel .owl-dot {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .rate {
            float: left;
            height: 46px;
            /* padding: 0 10px; */
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <main role="main">
        <div class="container-fluid single-product-view">
            <div class="row single-shop-row">
                <div class="col-6">
                    <div class="content-carousel">
                        <div class="wrapper">
                            <div class="image-gallery">
                                <aside class="thumbnails">
                                    @if (count($productImage) > 0)
                                        @foreach ($productImage as $index => $productImageitem)
                                            @if ($index == 0)
                                                <a href="#" class="selected thumbnail"
                                                    data-big="/storage/{{ $productImageitem->img }}">
                                                    <div class="thumbnail-image"
                                                        style="background-image: url('/storage/{{ $productImageitem->img }}')">
                                                    </div>
                                                </a>
                                                <div> <img src=""> </div>
                                            @else
                                                <a href="#" class=" thumbnail"
                                                    data-big="/storage/{{ $productImageitem->img }}">
                                                    <div class="thumbnail-image"
                                                        style="background-image: url('/storage/{{ $productImageitem->img }}')">
                                                    </div>
                                                </a>
                                                <div> <img src=""> </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </aside>
                                @if (count($productImage) > 0)
                                    <main class="primary"
                                        style="background-image: url('/storage/{{ $productImage[0]->img }}');background-repeat: no-repeat;
                                                                                background-size: cover;">
                                    </main>
                                @else
                                    @if ($productDetails->product_thumbnail_image)
                                        <main class="primary"
                                            style="background-image: url('/storage/{{ $productDetails->product_thumbnail_image }}');background-repeat: no-repeat;
                                                                        background-size: cover;">
                                        </main>
                                    @else
                                    @endif
                                @endif


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-5 ml-5 text-left single-product-content-box">
                    <div class="col-12">
                        <h3 class="single-product-name" id="name">{{ $productDetails->name }}</h3>
                        @php
                            $Now = Carbon\Carbon::now();
                            $toDay = $Now->toDateString();
                            $timeNow = $Now->toTimeString();
                            $rate = App\Models\Rate::where('product_id', $productDetails->id)->get();
                            $count_rate = 0;
                            $countRate = count($rate);
                            if ($countRate == 0) {
                                $countRate = 1;
                            }
                            foreach ($rate as $key => $value_rate) {
                                $count_rate += $value_rate->rate;
                            }
                            $avg_rate = $count_rate / $countRate;
                        @endphp
                        @if (
                            $productDetails->g_sale_price_date != null &&
                                $toDay <= $productDetails->g_sale_price_date &&
                                $timeNow <= $productDetails->g_sale_price_time)
                            <h6 class="single-product-price" id="price">${{ $productDetails->g_sale_price }}</h6>
                        @else
                            <h6 class="single-product-price" id="price">${{ $productDetails->g_regular_price }}</h6>
                        @endif

                        <a href="#product_rate" rel="modal:open">
                            <div class="rate">

                                @if ($avg_rate == 5)
                                    <input type="radio" disabled checked id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                @else
                                    <input type="radio" disabled id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                @endif


                                @if ($avg_rate == 4)
                                    <input type="radio" disabled checked id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                @else
                                    <input type="radio" disabled id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                @endif


                                @if ($avg_rate == 3)
                                    <input type="radio" disabled checked id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                @else
                                    <input type="radio" disabled id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                @endif


                                @if ($avg_rate == 2)
                                    <input type="radio" disabled checked id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                @else
                                    <input type="radio" disabled id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                @endif


                                @if ($avg_rate == 1)
                                    <input type="radio" disabled checked id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                @else
                                    <input type="radio" disabled id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                @endif

                            </div>
                        </a>


                    </div>

                    <div class="row col-12">
                        <div class="row pl-3">
                            <div class="col-4">
                                @php
                                    $Sold_Products = 0;
                                    $sale_items = 0;
                                    if ($productDetails->i_stock_quantity != null) {
                                        $sale_items = $productDetails->i_stock_quantity;
                                    }
                                    $sales = App\Models\SaleProduct::where('product_id', $productDetails->id)->get();
                                    
                                    foreach ($sales as $key => $sale) {
                                        $Sold_Products = +$sale->product_qty;
                                    }
                                    
                                @endphp


                                @if ($productDetails->Inventory_Stock_status == 1 || $sale_items > $Sold_Products)
                                    <div class="qty-input-single">
                                        <button class="qty-count qty-count--minus" data-action="minus"
                                            type="button">-</button>
                                        <input class="product-qty order_count" type="number" name="product-qty"
                                            min="0" max="20" value="1">
                                        <button class="qty-count qty-count--add" data-action="add"
                                            type="button">+</button>
                                    </div>
                                    <span class="badge bg-blue stock-staus">In Stock</span>
                                    {{-- <div class="qty-input-single">
                                        <button class="qty-count qty-count--minus" data-action="minus"
                                            type="button">-</button>
                                        <input class="product-qty order_count" type="number" name="product-qty" min="0"
                                            max="20" value="1">
                                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                    </div> --}}
                                    {{-- <span class="badge bg-blue">In Stock</span> --}}
                                @else<span class="badge bg-grey-400 out-of-stock-bg">Out of Stock</span>
                                @endif
                            </div>

                            <div class="col-6">
                                @if ($productDetails->description_productInventory_Stock_status == 1 || $sale_items > $Sold_Products)
                                    <a id="order_link" href="/add-to-cart?id={{ $productDetails->id }}&quantity=1">
                                        <button class="btn btn-primary btn-miracle-blog"
                                            style="margin-top: 0px;margin-bottom: 30px;" type="button">Add
                                            to Cart</button></a>
                                    <input type="text" value="{{ $productDetails->id }}" class="product-id" hidden>
                                @endif
                            </div>
                            <div class="col-12 mt-3"
                                style="border-bottom: 1px solid #AE7529;padding-left: 0px;margin-left: 15px;">
                                <h6 class="static-title-single-product-pg"> miracle Code : </h6>
                            </div>
                            <div class="col-12 mt-3"
                                style="border-bottom: 1px solid #AE7529;padding-left: 0px;margin-left: 15px;">
                                <div class="row">
                                    <div class="col-3 pr-0">
                                        <h6 class="static-title-single-product-pg">Categories : </h6>
                                    </div>
                                    <div class="col-7 text-left pl-0">
                                        @foreach ($productCatagoeries as $productCatagoeriesitem)
                                            {{ $productCatagoeriesitem->name }} ,
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3"
                                style="border-bottom: 1px solid #AE7529;padding-left: 0px;margin-left: 15px;">
                                <div class="row">
                                    <div class="col-2 pr-0">
                                        <h6 class="static-title-single-product-pg">Tags : </h6>
                                    </div>
                                    <div class="col-9 text-left pl-0">
                                        @foreach ($productTag as $productTagitem)
                                            {{ $productTagitem->tag_name }} ,
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5 mb-5 bottom-content-single-product-view">
                {!! $productDetails->descriptions !!}
            </div>

            @if ($realtive != null)
                <div class="row">
                    <div style="color:#AE7529" class="col-md-12 text-left">
                        <h3><strong>Related&nbsp;</strong>Products</h3>
                    </div>
                </div>
                <div class="row">
                    <div id="realtiveProducts" class="realtiveProducts owl-carousel owl-theme">
                        @foreach ($realtive as $realtivelitem)
                            <div class="itemrealtiveProducts">
                                <div class="text-center">
                                    <img class="img-realtiveProducts"
                                        src="/storage/{{ $realtivelitem->product_thumbnail_image }}"
                                        style="width: 205px;    display: -webkit-inline-box; margin-top: 60px;"
                                        width="205px;">
                                    <h6 class="img-miracle-realtiveProducts-text">{{ $realtivelitem->name }}</h6>
                                    <a href="/shop/product/{{ $realtivelitem->id }}"><button
                                            class="btn realtiveProducts btn-liq-main" type="button">Discover</button></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
        <div id="product_rate" class="modal">
            <div class="wrapper">
                <div class="master">
                    <h1>Review And Rating</h1>
                    <h2>How was your experience about our product?</h2>

                    <div class="rating-component">
                        <div class="status-msg">
                            <label>
                                <input class="rating_msg" type="hidden" name="rating_msg" value="" />
                            </label>
                        </div>
                        <div class="stars-box">
                            <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                            <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                            <i class="star fa fa-star" title="3 stars" data-message="Average quality"
                                data-value="3"></i>
                            <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                            <i class="star fa fa-star" title="5 stars" data-message="very good qality"
                                data-value="5"></i>
                        </div>
                        <div class="starrate">
                            <label>
                                <input class="ratevalue" type="hidden" id="_rate_value" name="rate_value"
                                    value="" />
                            </label>
                        </div>
                    </div>

                    <div class="feedback-tags">
                        <div class="tags-container" data-tag-set="1">
                            <div class="question-tag">
                                Why was your experience so bad?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="2">
                            <div class="question-tag">
                                Why was your experience so bad?
                            </div>

                        </div>

                        <div class="tags-container" data-tag-set="3">
                            <div class="question-tag">
                                Why was your average rating experience ?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="4">
                            <div class="question-tag">
                                Why was your experience good?
                            </div>
                        </div>

                        <div class="tags-container" data-tag-set="5">
                            <div class="make-compliment">
                                <div class="compliment-container">
                                    Give a compliment
                                    <i class="far fa-smile-wink"></i>
                                </div>
                            </div>
                        </div>

                        <div class="tags-box">
                            <input type="text" class="tag form-control" name="comment" id="inlineFormInputName"
                                placeholder="please enter your review">
                            <input type="hidden" id="_rate_product_id" name="product_id"
                                value="{{ $productDetails->id }}" />
                        </div>

                    </div>

                    <div class="button-box">
                        <input type="submit" class=" done btn btn-warning" disabled="disabled" value="Add review" />
                    </div>

                    <div class="submited-box">
                        <div class="loader"></div>
                        <div class="success-message">
                            Thank you!
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function filter(Type) {
                $('.box').hide();
                $('.' + Type).show();
                $('.box').removeClass('current');
                $('.filterClick').removeClass('current');
                $('.' + Type).addClass('current');
            }
            /* JS ____________*/
            $(document).ready(function() {

                filter('Profile');
                $(".owl-carousel").owlCarousel({
                    items: 1,
                    loop: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false,
                    rewind: true,
                    autoplay: false,
                    margin: 0,
                    nav: true
                });

                dotcount = 1;

                jQuery('.owl-dot').each(function() {
                    jQuery(this).addClass('dotnumber' + dotcount);
                    jQuery(this).attr('data-info', dotcount);
                    dotcount = dotcount + 1;
                });

                slidecount = 1;

                jQuery('.owl-item').not('.cloned').each(function() {
                    jQuery(this).addClass('slidenumber' + slidecount);
                    slidecount = slidecount + 1;
                });

                jQuery('.owl-dot').each(function() {
                    grab = jQuery(this).data('info');
                    slidegrab = jQuery('.slidenumber' + grab + ' img').attr('src');
                    jQuery(this).css("background-image", "url(" + slidegrab + ")");
                    jQuery(this).css("background-repeat", "no-repeat");
                });

                amount = $('.owl-dot').length;
                gotowidth = 100 / amount;
                jQuery('.owl-dot').css("height", gotowidth + "%");

            });


            var QtyInput = (function() {
                var $qtyInputs = $(".qty-input-single");

                if (!$qtyInputs.length) {
                    return;
                }

                var $inputs = $qtyInputs.find(".product-qty");
                var $countBtn = $qtyInputs.find(".qty-count");
                var qtyMin = parseInt($inputs.attr("min"));
                var qtyMax = parseInt($inputs.attr("max"));


                // $(".order_count").change(function() {
                //     // var qtyOrder = $(".product-qty").val();
                //     // var Product = $(".product-id").val();
                //     alert('ho');
                //     // var order_url = $('#order_link').attr('href', '/add-to-cart?id=' + Product + '&quantity=' +
                //         // qtyOrder);

                // });

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

                    var Product = $(".product-id").val();
                    var order_url = $('#order_link').attr('href', '/add-to-cart?id=' + Product + '&quantity=' +
                        qty);
                });
            })();



            $('.owl-carousel1').owlCarousel({
                center: true,
                items: 3,
                loop: true,
                margin: 10,
                nav: true
            });


            $('.thumbnail').on('click', function() {
                var clicked = $(this);
                var newSelection = clicked.data('big');
                var $img = $('.primary').css("background-image", "url(" + newSelection + ")");
                clicked.parent().find('.thumbnail').removeClass('selected');
                clicked.addClass('selected');
                $('.primary').empty().append($img.hide().fadeIn('slow'));
            });

            $('#realtiveProducts').owlCarousel({
                mouseDrag: false,
                loop: true,
                dots: false,
                margin: 10,
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
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });

            $(".rating-component .star").on("mouseover", function() {
                var onStar = parseInt($(this).data("value"), 10); //
                $(this).parent().children("i.star").each(function(e) {
                    if (e < onStar) {
                        $(this).addClass("hover");
                    } else {
                        $(this).removeClass("hover");
                    }
                });
            }).on("mouseout", function() {
                $(this).parent().children("i.star").each(function(e) {
                    $(this).removeClass("hover");
                });
            });

            $(".rating-component .stars-box .star").on("click", function() {
                var onStar = parseInt($(this).data("value"), 10);
                var stars = $(this).parent().children("i.star");
                var ratingMessage = $(this).data("message");

                var msg = "";
                if (onStar > 1) {
                    msg = onStar;
                } else {
                    msg = onStar;
                }
                $('.rating-component .starrate .ratevalue').val(msg);



                $(".fa-smile-wink").show();

                $(".button-box .done").show();

                if (onStar === 5) {
                    $(".button-box .done").removeAttr("disabled");
                } else {
                    $(".button-box .done").attr("disabled", "true");
                }

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass("selected");
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass("selected");
                }

                $(".status-msg .rating_msg").val(ratingMessage);
                $(".status-msg").html(ratingMessage);
                $("[data-tag-set]").hide();
                $("[data-tag-set=" + onStar + "]").show();
            });

            $(".feedback-tags  ").on("click", function() {
                var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
                choosedTagsLength = choosedTagsLength + 1;

                if ($(this).hasClass("choosed")) {
                    $(this).removeClass("choosed");
                    choosedTagsLength = choosedTagsLength - 2;
                } else {
                    $(this).addClass("choosed");
                    $(".button-box .done").removeAttr("disabled");
                }

                console.log(choosedTagsLength);

                if (choosedTagsLength <= 0) {
                    $(".button-box .done").attr("enabled", "false");
                }
            });



            $(".compliment-container .fa-smile-wink").on("click", function() {
                $(this).fadeOut("slow", function() {
                    $(".list-of-compliment").fadeIn();
                });
            });



            $(".done").on("click", function() {
                $(".rating-component").hide();
                $(".feedback-tags").hide();
                $(".button-box").hide();
                $(".submited-box").show();
                $(".submited-box .loader").show();

                var id = $('#_rate_product_id').val();
                var rate = $('#_rate_value').val();
                var review = $('#inlineFormInputName').val();

                $.ajax({
                    url: '/shop/product/rate',
                    data: {
                        id: id,
                        rate: rate,
                        review: review,
                    },
                    error: function() {

                    },
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $(".submited-box .loader").hide();
                        $(".submited-box .success-message").show();
                    },
                });

            });
        </script>


    </main>
    <style>
        .go_top {
            height: 40px;
            padding-top: 10px;
        }

        .image-gallery {
            margin: 0 auto;
            display: table;
        }

        .primary,
        .thumbnails {
            display: table-cell;
        }

        .thumbnails {
            width: 300px;
        }

        .primary {
            width: 100%;
            height: 375px;
        }

        .thumbnail:hover .thumbnail-image,
        .selected .thumbnail-image {
            border: 4px solid #AE7529;
        }

        .thumbnail-image {
            width: 100px;
            height: 100px;
            margin: 10px 5px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            border: 4px solid transparent;
        }

        .owl-carousel .owl-stage-outer {
            margin-left: 0px;
        }
    </style>
@endsection
