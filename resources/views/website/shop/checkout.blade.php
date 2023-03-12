@extends('website.layout.app')
@section('title')
    Checkout
@endsection
@section('content')
    <main role="main">

        <div class="container">
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
                <p class="lead"></p>
            </div>
            <div class="row" style="margin-bottom: 50px">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                    </h4>
                    <ul class="list-group mb-3 ">

                        @php
                            $total = 0;
                            $totel_items = 0;
                            
                        @endphp

                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                @php
                                    $total += $details['price'] * $details['quantity'];
                                    $totel_items += $details['quantity'];
                                @endphp

                                <li class="list-group-item m-0 ">
                                    <div class="row">
                                        <div class="col-sm-8 text-left">
                                            <h6 class="my-0">{{ $details['name'] }}</h6>
                                            <small class="text-muted">Quantity: {{ $details['quantity'] }}</small>
                                        </div>
                                        <div class="col-sm-4"> <span class="text-muted">LKR
                                                {{ $details['price'] * $details['quantity'] }}</span>
                                        </div>

                                    </div>

                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @php
                        $Shipping = 0;
                        $Discount = 0;
                        $Total = $total + $Shipping - $Discount;
                    @endphp
                    <span class="badge badge-secondary badge-pill mb-2">Total Items: {{ $totel_items }}</span>
                    <span class="badge badge-secondary badge-pill mb-2">Total: LKR {{ $Total }}</span>
                    {{-- <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
                <div class="col-md-8 order-md-1" style="text-align: left">
                    <h4 class="mb-3">Billing address</h4>
                    <form method="POST" action="{{ route('add.neworder') }}" class="needs-validation" novalidate="">
                        @csrf
                        <input type="hidden" name="total_price" value="{{ $Total }}" id="total_price">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" placeholder=""
                                    value="" required="">
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" name="lastName" class="form-control" id="lastName" placeholder=""
                                    value="" required="">
                                <div class="invalid-feedback"> Valid last name is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="username" class="form-control"
                                    value="@if (Auth::user()) {{ Auth::user()->name }} @endif" id="username"
                                    placeholder="Username" required="">
                                <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="@if (Auth::user()) {{ Auth::user()->email }} @endif"
                                placeholder="you@example.com">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value=""
                                placeholder="1234 Main St" required="">
                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">Address 2 </label>
                            <input type="text" name="address2" class="form-control" id="address2"
                                placeholder="Apartment or suite">
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" name="country" required="">
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback"> Please select a valid country. </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" name="state"
                                    required="">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback"> Please provide a valid state. </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder=""
                                    required="">
                                <div class="invalid-feedback"> Zip code required. </div>
                            </div>
                        </div>
                        {{-- <hr class="mb-4"> --}}
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div> --}}
                        {{-- <hr class="mb-4"> --}}
                        {{-- <h4 class="mb-3">Payment</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                    required="">
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                    required="">
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                    required="">
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback"> Name on card is required </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                <div class="invalid-feedback"> Credit card number is required </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback"> Expiration date required </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback"> Security code required </div>
                            </div>
                        </div> --}}
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" style="background-color:#006738"
                            type="submit">Continue to Place Order</button>
                    </form>
                </div>
            </div>
        </div>


    </main>

    <script>
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>
@endsection
