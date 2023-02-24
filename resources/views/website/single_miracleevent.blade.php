@extends('website.layout.app')
@section('title') miracle News & Events | {{$List->title}} @endsection
@section('content')

    <main role="main">
        <div class="container-fluid">
            <div class="single-item">
                <div class="container-fluid">
                    <div class="row" style="margin-top: 50px;margin-bottom: 100px;">
                        <div class="col-md-6 col-lg-6"><img class="news-events-single-pg-right-img"
                                src="/storage/{{ $List->img }}" />
                        </div>
                        {{-- <div class="col-md-4 col-lg-2 news-events-day-text">
                            <h1 class="news-events-day">
                                {{ \Carbon\Carbon::parse($List->date_end)->format('l') }}</h1>
                            <h1 class="news-events-day-num">
                                {{ \Carbon\Carbon::parse($List->date_end)->format('j') }}</h1>
                        </div> --}}
                        <div class="col-md-6 col-lg-6 news-events-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="news-events-day-pg-single">
                                        {{ \Carbon\Carbon::parse($List->date_end)->format('F j Y') }}</h1>
                                    <h1 class="news-events-content-title-pg-single">{{ $List->title }}
                                    </h1>
                                    <p class="news-events-content-text">
                                        {{ $List->short_des }}
                                        <br>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                <a href="#ex1" rel="modal:open"><button class="btn btn-regitser"
                                    type="button">Register
                                    Now<br></button></a>
                                </div>
                                <div class="col-md-12">
                                <h6 style="color:#AE7529;padding-top:10px">(Registration close on date: {{ \Carbon\Carbon::parse($List->date_end)->format('j F Y') }})</h6>
                                </div>
                            </div>

                            <div id="ex1" class="modal">
                                <form class="login-form" method="POST" action="{{ route('register.event') }}">
                                    @csrf
                                    <input name="exampleInputId" hidden value="{{$List->id}}">
                                    <h5>Register | {{ $List->title }}</h5>
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" name="exampleInputName" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
                                      </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">E-mail address</label>
                                        <input type="email" name="exampleInputEmail" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputTel">Contact Number</label>
                                        <input type="tel" name="exampleInputTel" class="form-control" id="phone" name="phone" placeholder="123-45-678"  required>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputCompany">Company</label>
                                        <input type="text" name="exampleInputCompany" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputDesignation">Designation</label>
                                        <input type="text" name="exampleInputDesignation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Designation">
                                      </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-liq-main">{{ __('Register Now') }}<i
                                                class="icon-circle-right2 ml-2"></i></button>
                                    </div>
                                </form>
                            </div>

                            <!-- Link to open the modal -->


                        </div>

                        <div class="col-sm-12 mt-3">
                            {!! $List->desc !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
