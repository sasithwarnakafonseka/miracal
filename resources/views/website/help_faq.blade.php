@extends('website.layout.app')
@section('title')
    Faq
@endsection
@section('content')
    <section>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15849.916811477202!2d80.20496256977539!3d6.7112221999999955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3b7d800d867b5%3A0xfb3b8d9e5534dbc0!2sKaluwala%20Waterfall!5e0!3m2!1sen!2slk!4v1664729169858!5m2!1sen!2slk"
            width="1600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    {{-- <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="text-center">CONNECT <br> WITH US</h2>
                </div>
                <div class="col-sm-3">
                    <span class="font-semibold">Address</span>
                    <p>No 18,<br>Old Road, Kaluthara</p>
                </div>
                <div class="col-sm-3">
                    <span class="font-semibold">Telephone</span>
                    <p>+94 11 2 55 66 88<br>+94 11 2 55 66 88</p>
                </div>
                <div class="col-sm-3">
                    <span class="font-semibold">Email</span>
                    <p>mbc@gmail.com<br>mbc@gmail.com</p>
                </div>
            </div>
        </div>
    </section> --}}


    <!--Section: Contact v.2-->
    <section class="container">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us
            directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" method="POST" action="{{ route('contactus') }}" lang="en"
                    novalidate>
                    @csrf
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" required id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" required id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" required id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" required id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>San Francisco, CA 94126, USA</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 01 234 567 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@mdbootstrap.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    </section>
    <!--Section: Contact v.2-->
@endsection
