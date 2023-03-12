@extends('website.layout.app')
@section('title') Site Search @endsection
@section('content')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <main role="main">
        <div id="toast"></div>
        <div class="container search-container">
            <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

            <div class="wrapper">
                <div class="search_box">
                    <div class="dropdown">
                        <div id="search_box_type" class="default_option">Select Type<i class="fas fa-caret-down"
                                style="color: #006738; font-size: 20px;margin-left: 14px;"></i></div>
                        <ul id="drop_down">
                            <li onclick="search_box_type(0)">Select Type</li>
                            <li onclick="search_box_type(1)">Product</li>
                            <li onclick="search_box_type(2)">Category</li>
                            <li onclick="search_box_type(3)">Appellation</li>
                        </ul>
                    </div>
                    <div class="search_field">
                        <input type="text" id="search_box_input" class="input" placeholder="Search">
                        <i class="fas fa-search" onclick="getFilterData()"></i>
                    </div>
                </div>
            </div>

        </div>

        <hr>

        <div class="container" style="z-index: 0;">
            <div id="listShow" class="container-grid-view-3 search-page-grid">



            </div>
        </div>


    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
           
            search_box_type(0);
        });
        

        let availableTags = [];
        var Type = 0;
      
        $("#search_box_type").click(function() {
           if($('#drop_down').hasClass('active3')){
            $('#drop_down').removeClass("active3");
           }else{
            $('#drop_down').addClass("active3");
           }
        });

        function search_box_type(val) {
            switch (val) {
                case 2:
                    // line block (2)
                    Type = 2;
                    getCategoryNames();
                    break;
                case 3:
                    // line block (3)
                    Type = 3;
                    getAppliactionNames();
                    break;
                case 1:
                    // line block (1)
                    Type = 1;
                    getProductNames();
                    break;
                default:
                    // line block (0)
                    Type = 0;
                    getAllNames();
            }
            $('#drop_down').removeClass("active3");
        }

        function getAllNames() {
            $.ajax({
                url: '/search/get/all',
                dataType: 'json',
                success: function(response) {
                    availableTags.splice(0, availableTags.length);

                    for (const key in response) {
                        if (Object.hasOwnProperty.call(response, key)) {
                            const element = response[key].name;
                            availableTags.push(element);
                        }
                    }

                }
            });
            //    console.log(availableTags);
        }

        function getProductNames() {


            $.ajax({
                url: '/search/get/products',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    availableTags.splice(0, availableTags.length);
                    response.forEach(element => {
                        availableTags.push(element.name);
                    });
                }
            });

        }

        function getCategoryNames() {
            $.ajax({
                url: '/search/get/category',
                dataType: 'json',
                success: function(response) {
                    availableTags.splice(0, availableTags.length);
                    response.forEach(element => {
                        availableTags.push(element.name);
                    });
                }
            });
        }

        function getAppliactionNames() {
            $.ajax({
                url: '/search/get/appliaction',
                dataType: 'json',
                success: function(response) {
                    availableTags.splice(0, availableTags.length);
                    response.forEach(element => {
                        availableTags.push(element.atributes_);
                    });
                }
            });
        }
        $("#search_box_input").autocomplete({

            source: availableTags
        });

        function getFilterData() {
            $.ajax({
                url: '/search/web',
                dataType: 'json',
                data: {
                    type: Type,
                    key: $('#search_box_input').val(),
                    _token: '{{ csrf_token() }}',
                },
                type: "post",
                success: function(response) {
                    var html = '';
                    response.forEach(element => {
                        if (element != null) {
                            html +=
                                '<div class="products_view" product_color="" item_price_regular="">';
                            html += '<a class="shop-pg-product" href="/shop/product/' +
                                element.id + '/' + element.name + '">';
                            html += '<div class="single-item">';
                            html +=
                                '<div class="col-md-6" style="text-align: center;font-size: 14px; max-width: initial;">';
                            if (element.product_thumbnail_image) {
                                html += '<img src="/storage/' + element.product_thumbnail_image +
                                    '" class="img-grid-view" />';
                            } else {
                                html += '<img src="\static\Image-2-1.jpg" class="img-grid-view" />';
                            }
                            html += '<h1>' + element.name + '</h1>';
                            html += '<p class="portfolio-product-price">LKR' + element.g_regular_price +
                                '</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';
                        }
                    });

                    $('#listShow').empty().append(html);
                }
            });
        }
    </script>
@endsection
