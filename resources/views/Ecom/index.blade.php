@extends('layouts.app')
@section('title', 'Versions')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - <div
                        class="PageLocation"></div>
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <div class="btn-group">
                    {{-- <button type="button" class="btn bg-indigo-400"><i class="icon-upload7 mr-2"></i> New Module Upload</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content pt-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title"></h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid bg-slate border-0 nav-tabs-component rounded">
                            <li class="nav-item"><a href="#colored-rounded-tab1" class="nav-link active rounded-left"
                                    data-toggle="tab">Orders</a></li>
                            {{-- <li class="nav-item"><a href="#colored-rounded-tab2" class="nav-link"
                                    data-toggle="tab">Customers</a></li> --}}
                            {{-- <li class="nav-item"><a href="#colored-rounded-tab3" class="nav-link"
                                    data-toggle="tab">Settings</a></li> --}}
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade  active show m-3" id="colored-rounded-tab1">
                                {{-- <button type="button" class="btn bg-indigo-400 float-right"><i
                                        class="icon-upload7 mr-2"></i>Create New Order</button> --}}
                                <div class="responsive">
                                    <table class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Client Type</th>
                                                <th>Register User Name</th>
                                                <th>Billing Name</th>
                                                <th>Order QTY</th>
                                                <th>Total Price</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>
                                                        @if ($order->customer_id==0)
                                                            Working Client
                                                        @else
                                                            Registered
                                                        @endif
                                                    </td>
                                                    @php
                                                        if($order->customer_id!=0){
                                                            $AccountName = App\Models\User::find($order->customer_id);
                                                        }else {
                                                            $AccountName = App\Models\SaleBill::where('sale_id',$order->id)->first();
                                                        }
                                                       
                                                        $QtY = 0;
                                                        $TotalPrice = 0;
                                                    @endphp
                                                    <td>@if ($order->customer_id!=0)
                                                        {{ $AccountName->name }}
                                                    @else
                                                        {{ $AccountName->bill_fname}}  {{ $AccountName->bill_lname}}
                                                    @endif</td>
                                                    <td>@foreach ($order->salebill as $salebill){{ $salebill->bill_fname }} {{ $salebill->bill_lname }}@endforeach</td>
                                                    <td>
                                                        @foreach ($order->saleproduct as $saleproduct)

                                                            @php
                                                                $QtY += $saleproduct->product_qty;
                                                                
                                                                $product = App\Models\Products::find($saleproduct->product_id);
                                                                if ($product) {
                                                                    $g_regular_price = $product['g_regular_price'];
                                                                } else {
                                                                    $g_regular_price = 0;
                                                                }
                                                                $TotalPrice += $g_regular_price * $saleproduct->product_qty;
                                                            @endphp

                                                        @endforeach

                                                        {{ $QtY }}
                                                    </td>
                                                    <td>{{ $TotalPrice }}</td>
                                                    <td>@foreach ($order->salebill as $salebill){{ $salebill->bill_email }}@endforeach</td>
                                                    <td>
                                                        @if ($order->status == 1)<span
                                                                class="badge bg-blue"
                                                            style="background-color: #FF5733">Pending</span>@elseif($order->status==0)<span
                                                                class="badge"
                                                            style="background-color: yellow">Processing</span>@elseif($order->status==2)<span
                                                                class="badge"
                                                            style="background-color: Green">Completed</span>@elseif($order->status==3)<span
                                                                class="badge"
                                                                style="background-color: Red">Rejected</span>@endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                {{-- <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="Order_edit({{ $order }})">
                                                                    <i class="icon-pencil"></i>
                                                                </a> --}}
                                                                <a href="#"
                                                                    class="btn mt-1 bg-success-600 rounded-round btn-icon btn-sm "
                                                                    onclick="Order_List({{ $order }})">
                                                                    <i class="icon-eye"></i>
                                                                </a>
                                                                <a href="#"
                                                                    class="btn mt-1 bg-success-800 rounded-round btn-icon btn-sm "
                                                                    onclick="Order_Bill({{ $order }})">
                                                                    <i class="icon-download"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="col-12">
                                                                    <form method="POST"
                                                                        action="{{ route('ecom.delete') }}"
                                                                        class="delete_product">
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group">
                                                                            <input type="text" name="pr_delete_id"
                                                                                id="br_delete_id{{ $order->id }}"
                                                                                value="{{ $order->id }}" hidden>
                                                                            <input type="submit"
                                                                                class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user"
                                                                                value="Delete order">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-12">
                                                                    <select id="br_status{{ $order->id }}" onchange="change_status({{$order->id}})" name="status"
                                                                        data-placeholder="Change Status"
                                                                        class="Change_Status form-control">
                                                                        <option></option>
                                                                        <option value="1">Pending</option>
                                                                        <option value="0">Processing</option>
                                                                        <option value="2">Completed</option>
                                                                        <option value="3">Rejected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade m-3" id="colored-rounded-tab2">
                                {{-- <button type="button" class="btn bg-indigo-400 float-right"><i
                                        class="icon-upload7 mr-2"></i>Create New User</button> --}}
                                <div class="responsive">
                                    <table class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Orders</th>
                                                <th>Customer Type</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td>{{ $customer->id }}</td>
                                                    <td>{{ $customer->name }}</td>
                                                    @php
                                                        $oders = 0;
                                                        $odersList = App\Models\Sale::where('customer_id', $customer->id)->get();
                                                        
                                                        $oders = count($odersList);
                                                        
                                                    @endphp
                                                    <td>{{ $oders }}</td>
                                                    @if ($customer->type == 1) admin @else Customer @endif</td>
                                                    <td>@if ($customer->status == 1) Active @else Block @endif</td>
                                                    <td>
                                                        <a href="#"
                                                            class="btn bg-success-600 rounded-round btn-icon btn-sm "
                                                            onclick="ViewOrders({{ $customer->id }})">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab3">
                                DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                                whatever.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="add_new_order_dash" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>

            </div>
        </div>
    </div>

    <div id="order_list_user" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="responsive">
                    <div class="card-body">
                        <table id="product_list_by_user" class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Bill User Name</th>
                                    <th>Bill User Mail</th>
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

    <div id="order_bill" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="bill-body" class="modal-body">
                    <div class="col-md-12 text-right mb-3">
                        <button class="btn btn-primary" id="download"> download pdf</button>
                    </div>
                    <div class="col-md-12">
                        <div class="card" id="invoice">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-4 pull-left">

                                            <ul class="list list-unstyled mb-0 text-left">
                                                <li><img src="/global_assets/images/logo-menu.png" alt="logo" width="200px">
                                                </li>
                                                <li>M. Kandoogasdhoshuge ,2nd Floor, Orchid Magu,</li>
                                                <li>Male'20-129, Republic of Maldives</li>
                                                <li>Phone (960) 333 4411 Fax (960) 333 4436</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4 ">
                                            <div class="text-sm-right">
                                                <h4 class="invoice-color mb-2 mt-md-2">Invoice #BBB1243</h4>
                                                <ul class="list list-unstyled mb-0">
                                                    <li>Date: <span class="font-weight-semibold">March 15, 2020</span></li>
                                                    <li>Due date: <span class="font-weight-semibold">March 30, 2020</span>
                                                    </li>
                                                </ul>
                                                <ul class="list list-unstyled mb-0">
                                                    <li>PFI number:: <span class="font-weight-semibold">March 15,
                                                            2020</span></li>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-md-flex flex-md-wrap">
                                    <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Invoice To:</span>
                                        <ul class="list list-unstyled mb-0">
                                            <li>
                                                <h5 class="my-2">Tibco Turang</h5>
                                            </li>
                                            <li><span class="font-weight-semibold">Samantha Mutual funds Ltd</span></li>
                                            <li>Gurung Street</li>
                                            <li><a href="#" data-abc="true">tibco@samantha.com</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive p-1">
                                <table class="table bill_table table-lg">
                                    <thead>
                                        <tr class="table-border-double table table-bordered table-sm"
                                            style="background-color:#620053;color:white">
                                            <th>SN</th>
                                            <th>Item Description</th>
                                            <th>QTY (Units)</th>
                                            <th>Unit Price (Case)</th>
                                            <th>
                                                 (USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total(USD)</th>
                                        <th id="total_price"></th>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-footer" style="background-color: #620053"> <span class="text-muted">
                                    Shipment terms: Bond, Male’ Maldives <br>

                                    Offer & Currency: US Dollars<br>

                                    Payment terms: 100% payment in advance<br>

                                    Account details:<br>

                                    Beneficiary Name: Miracle (PVT) LTD<br>

                                    Account Number: 200-003798-103 USD<br>

                                    Bank Name: Hongkong and Shanghai Banking Corporation Limited (HSBC)<br>

                                    Bank Address: MTTC Tower, 24 Boduthakurufaanu Magu, Male' 20-05, Republic of
                                    Maldives<br>

                                    Swift/BIC Code:data HSBCMVMV
                                </span> </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        var t_product_list = $('#product_list').DataTable();
        var t_product_list_user = $('#product_list_by_user').DataTable();
        var t_product_list_bill = $('.bill_table').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false
        });
        // Basic initialization
        $('.datatable-basic').DataTable({
            autoWidth: false,
            "order": [
                [0, "desc"]
            ],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': '→',
                    'previous': '←'
                }
            }
        });

        $('.PageLocation').empty().append('Ecommerce');


        function Order_edit(data) {
            $('#add_new_order_dash').modal('toggle');
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
        var total_cost = 0;

        

        function Order_Bill(data) {
            t_product_list_bill.clear().draw();
            total_cost = 0;
            // console.log(data);
            data.saleproduct.forEach(i => {
                getProductByIdBill(i.product_id, i.product_qty);
            });
            $('#order_bill').modal('toggle');

        }



        function getProductByIdBill(id, qtyOrder) {
            $.ajax({
                url: '/ModuleProducts/product/getproduct/id',
                data: {
                    id: id,
                },
                error: function() {},
                type: "GET",
                // contentType: "application/json",
                success: function(data) {

                    t_product_list_bill.row.add([
                        id,
                        data.name,
                        qtyOrder,
                        data.g_regular_price + ' $',
                        qtyOrder * data.g_regular_price + ' $'
                    ]).draw(false);
                    total_cost = +total_cost + qtyOrder * data.g_regular_price
                    $('#total_price').empty().append(total_cost + '$');
                },

            });
        }

        window.onload = function() {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("invoice");
                    var opt = {
                        // margin: 1,
                        filename: 'invoice.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 2
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'letter',
                            orientation: 'portrait'
                        }
                    };
                    html2pdf().from(invoice).set(opt).save();
                })
        }

        function ViewOrders(id) {
            $('#order_list_user').modal('toggle');
            $.ajax({
                url: '/ModuleProducts/product/getuser/id',
                data: {
                    id: id,
                },
                error: function() {

                },
                type: "GET",
                // contentType: "application/json",
                success: function(data) {
                    t_product_list_user.clear();
                    data.forEach(i => {
                        console.log(i);
                        t_product_list_user.row.add([
                            i.id,
                            i.salebill[0].bill_fname + i.salebill[0].bill_lname,
                            i.salebill[0].bill_email,
                        ]).draw(false);
                    });
                },
            });
        }

        function getProductById(id, qtyOrder) {
            var returnData;
            $.ajax({
                url: '/ModuleProducts/product/getproduct/id',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                error: function() {},
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


        function change_status(id) {
            var status = $('#br_status'+id).val();
            $.ajax({
                url: '/Ecom/change/status',
                data: {
                    id:id,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                error: function() {},
                type: "POST",
                // contentType: "application/json",
                success: function(data) {
                    location.reload();
                },
            });
        }
    </script>
    <style>
        .PageLocation {
            display: contents;
        }

    </style>
@endsection
