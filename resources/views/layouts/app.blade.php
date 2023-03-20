<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Miracles- @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>


    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- /core JS files -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>


    <link rel="stylesheet" href="/css/admin_css.css">

    <script src="{{ asset('limitless/assets/js/app.js') }}"></script>
    <script src="{{ asset('js/admin_app.js') }}"></script>
    @toastr_css
    <!-- /theme JS files -->
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light">

        <!-- Header with logos -->
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                {{-- <a href="index.html" class="d-inline-block"> --}}
                <h1>Miracle</h1>
                {{-- </a> --}}
            </div>

            <div class="navbar-brand navbar-brand-xs">
                <a href="index.html" class="d-inline-block">
                    <img src="../../../../global_assets/images/logo_icon_light.png" alt="">
                </a>
            </div>
        </div>
        <!-- /header with logos -->


        <!-- Mobile controls -->
        <div class="d-flex flex-1 d-md-none">
            <div class="navbar-brand mr-auto">
                <a href="index.html" class="d-inline-block">
                    <img src="../../../../global_assets/images/logo_dark.png" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>

            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>
        <!-- /mobile controls -->


        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-content wmin-md-300">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Users online</span>
                            <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">

                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-grey mr-auto">All users</a>
                            <a href="#" class="text-grey"><i class="icon-gear"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
            @php
                $mytime = Carbon\Carbon::now();
            @endphp
            <span class="badge bg-pink-400 badge-pill ml-md-3 mr-md-auto">Time : <div style="display: contents;"
                    class="digital-clock">00:00:00</div> {{ $mytime->toDateString() }}</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown">
                        @if (Auth::user()->img)
                            <img src="{{ Auth::user()->img }}" class="rounded-circle mr-2" height="34" alt="">
                        @else
                            <i class="icon-user"></i>
                        @endif
                        <span> {{ Auth::user()->name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a href="{{ route('MyProfile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My
                            profile</a> --}}
                        <a href="{{ route('ProfileSettings') }}" class="dropdown-item"><i
                                class="icon-cog5"></i>
                            Account settings</a>
                        <div class="dropdown-divider"></div>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="dropdown-item"><i class="icon-switch2"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /navbar content -->

    </div>
    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                @if (Auth::user()->img)
                                    <img src="{{ Auth::user()->img }}" class="rounded-circle mr-2" height="34"
                                        alt="">
                                @else
                                    <a href="#"><img src="{{ asset('global_assets/images/image.png') }}" width="38"
                                            height="38" class="rounded-circle" alt=""></a>
                                @endif
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-mailbox font-size-sm"></i> {{ Auth::user()->email }}
                                </div>
                            </div>

                            <div class="ml-3 align-self-center">
                                <a href="{{ route('ProfileSettings') }}" class="text-white"><i
                                        class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                                title="Main"></i>
                        </li>
                        <li class="nav-item">
                            <a href="/admin_dashboard" class="sideNav sideNavId-Dashboard nav-link active">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                    <span class="d-block font-weight-normal opacity-50">No active orders</span>
                                </span>
                            </a>
                        </li>

                        @php
                            $authId = Auth::user()->id;
                            $user_admins = DB::table('admin_user_type')
                                ->where('user_id', $authId)
                                ->first();
                        @endphp





                        @if ($user_admins->ecommerce)
                            <li class="nav-item"><a href="{{ route('Ecom') }}"
                                    class="sideNav sideNavId-ModuleV nav-link"><i class="icon-price-tag"></i>
                                    <span>Ecommerce</span></a></li>
                        @endif

                        @if ($user_admins->products)
                            <li class="nav-item"><a href="{{ route('ModuleProducts') }}"
                                    class="sideNav sideNavId-ProductsV nav-link"><i class="icon-cart"></i>
                                    <span>Products</span></a></li>
                        @endif
                        @if ($user_admins->marketing)
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link sideNavId-Marketingv"><i class="icon-megaphone"></i>
                                    <span>Marketing</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Basic tables" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('ModuleMarketing/WebPages') }}"
                                            class="nav-link">Web Pages</a></li>
                                    <li class="nav-item"><a href="{{ route('ModuleMarketing/Testimonios') }}"
                                            class="nav-link">Testimonios</a></li>
                                    <li class="nav-item"><a href="{{ route('ModuleMarketing/Partners') }}"
                                            class="nav-link">Partners</a></li>
                                    <li class="nav-item"><a href="{{ route('ModuleMarketing/Teams') }}"
                                            class="nav-link">Teams</a></li>
                                </ul>
                            </li>
                        @endif
                        @if ($user_admins->mobile_notifications)
                            <li class="nav-item"><a href="{{ route('MobileNotification') }}"
                                    class="sideNav sideNavId-MobileN nav-link"><i class="icon-bubble-notification"></i>
                                    <span>Notification</span></a></li>
                        @endif

                        @if ($user_admins->posts)
                            <li class="nav-item"><a href="{{ route('ModulePosts') }}"
                                    class="sideNav sideNavId-Posts nav-link"><i class="icon-blog"></i>
                                    <span>Posts</span></a></li>
                        @endif
                        @if ($user_admins->user_managemet)
                            <li class="nav-item"><a href="{{ route('UserManagemet') }}"
                                    class="sideNav sideNavId-UserM nav-link"><i class="icon-users2"></i> <span>User
                                        Managemet</span></a></li>
                        @endif
                        @if ($user_admins->report)
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="sideNav sideNavId-report nav-link"><i class="icon-book"></i>
                                    <span>Reports</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Basic tables" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('report.sales') }}"
                                            class="nav-link">Sales Report</a></li>
                                </ul>
                            </li>

                        @endif

                        <!-- /main -->
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                    data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->


</body>
<script>
    var pathname = window.location.pathname;
    someVariable = pathname.replace('/', '');

    if (someVariable == 'UserManagemet') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-UserM').addClass('active');
    }

    console.log(someVariable);

    if (someVariable == 'ModuleMarketing/Testimonios' || someVariable == 'ModuleMarketing/Partners' || someVariable ==
        'ModuleMarketing/WebPages' || someVariable == 'ModuleMarketing/Teams') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-Marketingv').addClass('active');
    }

    if (someVariable == 'ModuleProducts') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-ProductsV').addClass('active');
    }

    if (someVariable == 'Ecom') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-ModuleV').addClass('active');
    }

    if (someVariable == 'MobileNotification') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-MobileN').addClass('active');
    }

    if (someVariable == 'ModulePosts') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-Posts').addClass('active');
    }
    if (someVariable == 'report') {
        if ($('.sideNav').hasClass("active")) {
            $('.sideNav').removeClass('active');
        }
        $('.sideNavId-report').addClass('active');
    }


    $(document).ready(function() {
        $("select").select2({
            width: '100%',
            height: '100%'
        });
    });
</script>



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.7/firebase.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $('input[name="dates"]').daterangepicker();

    var firebaseConfig = {
        apiKey: "AIzaSyBTRcoAJwbJi8bZuWkAHZft8bA83E3URBM",
        authDomain: "themiracleconceptweb.firebaseapp.com",
        projectId: "themiracleconceptweb",
        storageBucket: "themiracleconceptweb.appspot.com",
        messagingSenderId: "489809216375",
        appId: "1:489809216375:web:c8171330eb463af614d772",
        measurementId: "G-L8638KD2MX"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function startFCM() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('store.token') }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        alert('Token stored.');
                    },
                    error: function(error) {
                        alert(error);
                    },
                });
            }).catch(function(error) {
                alert(error);
            });
    }
    messaging.onMessage(function(payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
        console.log(title);
    });
</script>


@toastr_js
@toastr_render

</html>
