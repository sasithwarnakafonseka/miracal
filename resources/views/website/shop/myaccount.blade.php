@extends('website.layout.app')
@section('title')
    My Account
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a class="my-account-nav-bar" href="#dashboad" onclick="openTab(1);" class=""
                                    data-toggle="
                                        tab"><i
                                        class="fa fa-window-maximize"></i>
                                    Dashboard</a>
                                <a class="my-account-nav-bar" href="#orders" onclick="openTab(2);" data-toggle="tab"
                                    class=""><i class=" fa fa-cart-arrow-down"></i>
                                    Orders</a>
                                <a class="my-account-nav-bar" href="#orders" onclick="openTab(3);" data-toggle="tab"
                                    class=""><i class="fa-solid fa-tree"></i>
                                    Hierarchy </a>
                                <a class="my-account-nav-bar" href="#orders" onclick="openTab(5);" data-toggle="tab"
                                    class=""><i class="fa-solid fa-tree"></i>
                                    My Commission </a>
                                <a class="my-account-nav-bar" href="#orders" onclick="openTab(6);" data-toggle="tab"
                                    class=""><i class="fa fa-users" aria-hidden="true"></i>
                                    My Team </a>
                                <a class="my-account-nav-bar" href="#address-edit" onclick="openTab(4);" data-toggle="tab"
                                    class="active"><i class="fa fa-map-marker"></i>
                                    Account Edit</a>

                                <a class="my-account-nav-bar" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    class="dropdown-item"><i class="ml-2 mr-2 fas fa-sign-out-alt"></i>{{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_1 active show" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>{{ Auth::user()->name }}</strong></p>
                                        </div>

                                        <p class="mb-0">From your account dashboard. you can easily check &amp;
                                            view your
                                            recent orders, manage your account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_2" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-left">
                                            <table class="table datatable-basic">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j Y') }}
                                                            </td>
                                                            <td>
                                                                @if ($order->status == 1)
                                                                    <span class="badge bg-blue"
                                                                        style="background-color: #FF5733">Pending</span>
                                                                @elseif($order->status == 0)
                                                                    <span class="badge"
                                                                        style="background-color: yellow">Processing</span>
                                                                @elseif($order->status == 2)
                                                                    <span class="badge"
                                                                        style="background-color: Green">Completed</span>
                                                                @elseif($order->status == 3)
                                                                    <span class="badge"
                                                                        style="background-color: Red">Rejected</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $order->total_price }} $
                                                            </td>
                                                            <td> <a href="#"
                                                                    class="btn mt-1 bg-success-600 rounded-round btn-icon btn-sm "
                                                                    onclick="Order_List({{ $order }})">
                                                                    <i class="icon-eye">View</i>
                                                                </a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_3" id="hierarchy" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Hierarchy</h3>
                                        <div id="chart-container"></div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_5" id="my-commission" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>My Commission</h3>

                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_6" id="my-team" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>My Team</h3>
                                        <div class="account-details-form text-left">
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <input type="text" hidden value="Hello World" id="shearLink">
                                                    <button onclick="copyLink()">Copy Shear Link</button>
                                                </div>
                                                <div class="col-sm-6"><button class="btn"
                                                        onclick="SendLinkPopup()">Add New User</button></div>
                                            </div>
                                            <div class="row">
                                                <table class="table datatable-basic">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Level</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade tab-pane_4" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form text-left">
                                            <form method="POST" action="{{ route('login-register.update') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputCompany">Company</label>
                                                            <input type="text" class="form-control"
                                                                name="exampleInputCompany" id="exampleInputCompany"
                                                                aria-describedby="emailHelp"
                                                                value="{{ Auth::user()->name }}"
                                                                placeholder="Enter company">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control"
                                                                name="exampleInputEmail1" id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                value="{{ Auth::user()->email }}"
                                                                placeholder="Enter email">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPhone">Phone</label>
                                                            <input type="number" minlength="10" maxlength="10"
                                                                class="form-control" name="exampleInputPhone"
                                                                id="exampleInputPhone" aria-describedby="phoneHelp"
                                                                value="{{ Auth::user()->phone }}"
                                                                placeholder="Enter phone">

                                                        </div>
                                                    </div>
                                                </div>

                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current
                                                            Password</label>
                                                        <input type="password" class="form-control" name="current_pwd"
                                                            placeholder="Enter current password" id="current-pwd">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Enter new password" name="new_pwd"
                                                                    id="new-pwd">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Enter confirm new password"
                                                                    name="confirm_pwd" id="confirm-pwd">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn ">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
    <div id="order_list" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="responsive">
                    <div class="card-body">
                        <table id="product_list" class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Order QTY</th>
                                    <th>Price Per</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="send-request" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Send Register Request Mail To Child User
                </div>
                <form method="POST" action="{{ route('login-register.update') }}">
                    @csrf
                <div class="modal-body">
                       
                            <input type="email" class="form-control" name="sendEmail" id="sendEmail"
                                aria-describedby="sendEmail" value="" placeholder="Enter email">
                     
                </div>
                <div class="modal-footer">
                    <button class="btn best-sellers-btn">Send Request</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <style>
        #order_list {
            max-width: 829px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js"
        integrity="sha512-alnBKIRc2t6LkXj07dy2CLCByKoMYf2eQ5hLpDmjoqO44d3JF8LSM4PptrgvohTQT0LzKdRasI/wgLN0ONNgmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function openTab(id) {
            $('.tab-pane').removeClass("active show");
            $('.tab-pane_' + id).addClass("active show");
        }

        function Order_List(data) {
            $('#order_list').modal('toggle');

            // console.log()

            t_product_list.clear();
            // console.log(data);
            data.saleproduct.forEach(i => {
                getProductById(i.product_id, i.product_qty);
            });
        }

        function SendLinkPopup() {
            $('#send-request').modal('toggle');
        }

        var t_product_list = $('#product_list').DataTable();

        function getProductById(id, qtyOrder) {
            var returnData;
            $.ajax({
                url: '/ModuleProducts/product/getproduct/id',
                data: {
                    id: id,
                },
                error: function() {

                },
                type: "GET",
                // contentType: "application/json",
                success: function(data) {
                    t_product_list.row.add([
                        id,
                        data.name,
                        qtyOrder,
                        data.g_regular_price + ' $',
                        qtyOrder * data.g_regular_price + ' $'
                    ]).draw(false);

                },
            });
        }

        function copyLink() {
            // Get the text field
            var copyText = document.getElementById("shearLink");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }

        var datascource = {
            'name': 'Lao Lao',
            'title': 'general manager',
            'children': [{
                    'name': 'Bo Miao',
                    'title': 'department manager'
                },
                {
                    'name': 'Su Miao',
                    'title': 'department manager',
                    'children': [{
                            'name': 'Tie Hua',
                            'title': 'senior engineer'
                        },
                        {
                            'name': 'Hei Hei',
                            'title': 'senior engineer'
                        }
                    ]
                },
                {
                    'name': 'Hong Miao',
                    'title': 'department manager'
                },
                {
                    'name': 'Chun Miao',
                    'title': 'department manager'
                }
            ]
        };
        var oc = $('#chart-container').orgchart(datascource);
    </script>
@endsection
