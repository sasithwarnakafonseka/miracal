@extends('website.layout.app')
@section('title') Cart @endsection
@section('content')
    <main role="main">

        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Shopping Cart</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in,
                        mattis vitae leo.</p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                @php $total = 0 @endphp

                                @if (session('cart'))

                                    @foreach (session('cart') as $id => $details)

                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <div data-id="{{ $id }}" class="product">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img class="img-fluid mx-auto d-block image pl-3"
                                                        src="/storage/{{ $details['image'] }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-md-5 product-name">
                                                                <div class="product-name">
                                                                    <a style="color: #006738"
                                                                        href="#">{{ $details['name'] }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 quantity">
                                                                <label for="quantity">Quantity:</label>
                                                                <div class="qty-input">
                                                                    <button class="qty-count qty-count--minus"
                                                                        data-action="minus" type="button" product_id="{{ $id }}">-</button>
                                                                    <input id="quantity"
                                                                        class="product-qty item_{{ $id }} form-control quantity-input update-cart"
                                                                        min="0" max="{{ $details['max_items'] }}"
                                                                        type="number" name="product-qty" min="0" max="20"
                                                                        value="{{ $details['quantity'] }}"
                                                                        product_id="{{ $id }}">
                                                                    <button class="qty-count qty-count--add"
                                                                        data-action="add" type="button" product_id="{{ $id }}">+</button>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3 price">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <span>LKR {{ $details['price'] * $details['quantity'] }}</span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <button class="btn btn-liq-main remove-from-cart"
                                                                            product_id="{{ $id }}" type="button"
                                                                            id="button-addon2"><i class="fa fa-trash"
                                                                                aria-hidden="true"></i></button>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                @endif


                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                @php
                                     $Shipping = 0;
                                     $Discount = 0;
                                    $Total = $total + $Shipping - $Discount
                                @endphp
                                <h3>Summary</h3>
                                <div class="summary-item"><div class="row"><div class="col-sm-6 text-left"><span class="text">Subtotal</span></div><div class="col-sm-6 text-"><span class="price">LKR {{$total}}</span></div></div>
                                </div>
                                <div class="summary-item"><div class="row"><div class="col-sm-6 text-left"><span class="text">Discount</span></div><div class="col-sm-6 text-"><span class="price">LKR {{$Discount}}</span></div></div>
                                </div>
                                <div class="summary-item"><div class="row"><div class="col-sm-6 text-left"><span class="text">Shipping</span></div><div class="col-sm-6 text-"><span class="price">LKR {{$Shipping}}</span></div></div>
                                </div>
                                <div class="summary-item"><div class="row"><div class="col-sm-6 text-left"><span class="text">Total</span></div><div class="col-sm-6 text-"><span class="price">LKR {{$Total}}</span></div></div>
                                </div>
                                <a class="cart-pg-checkout-btn-link" @if($Total>0) href="/shop/checkout" @else href="javascript:void(0)" @endif><button type="button"
                                    class="btn btn-primary btn-lg btn-block cart-pg-checkout-btn">Place Order</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
