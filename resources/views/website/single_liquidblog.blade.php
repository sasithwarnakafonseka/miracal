@extends('website.layout.app')
@section('title') miracle Blog | {{$List->title}} @endsection
@section('content')
    <main role="main">
        <div class="container">
            <div class="single-item blog-pg-top-single">
                <div class="card-blog blog-pg-top-sec">
                    <img class="card-img-top" src="/storage/{{ $List->img }}" alt="Card image cap">
                    <div class="card-blog-body blog">
                        <h1 class="card-title-blog">{{ $List->title }}</h1>
                        <h2 class="card-author-title-blog"><span style="color:#000;">By </span>{{$postUser->name}}</h2>
                        {{-- <p class="cart-text-blog">S{{ $List->short_des }}</p> --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="container blog-pg-single-desc">
            {!! $List->desc !!}
        </div>
    </main>
@endsection
