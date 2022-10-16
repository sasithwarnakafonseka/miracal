@extends('layouts.app')
@section('title', 'Profile')
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
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content pt-0">
        <div class="row">

            <div class="ml-2 form-group">
                <label>Sales Dates:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                    </span>
                    @php
                        $current = Carbon\Carbon::now();
                    @endphp
                    <input type="text" id="salesDate" name="daterange" class="form-control daterange-basic"
                        value="{{ $current }}">
                </div>
            </div>

            <div class="col-xl-12">
                <!-- Traffic sources -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Sales Report</h6>
                    </div>
                    <div class="card-body py-0">
                        <div class="responsive">
                            <table class="table datatable-basic text-center">
                                <thead>
                                    <tr>
                                        <th>Sales Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Product</th>
                                        <th>Order Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /traffic sources -->

            </div>



        </div>
        <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_init.js') }}"></script>
        <script>
            $('.PageLocation').empty().append('Sales Report');

            var t = $('.datatable-basic').DataTable({
                autoWidth: false,
                "order": [
                    [0, "desc"]
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                // dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
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

            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    var startDate = start.format('YYYY-MM-DD');
                    var endDate = end.format('YYYY-MM-DD');
                    getSales(startDate, endDate);
                });
            });


            function getSales(start, end) {
                t.clear().draw();
                $.ajax({
                    url: '/report/sales/getsalesbydate',
                    data: {
                        start: start,
                        end: end,
                        _token: '{{ csrf_token() }}'
                    },
                    type: "Get",
                    error: function() {
                        alert('Error');
                    },
                    success: function(data) {
                        data.forEach(i => {
                            if (i.total_price > 0) {
                                if (i.saleproduct.length > 0) {
                                    var table_saleproduct = "";
                                    table_saleproduct += "<table>";
                                    i.saleproduct.forEach(element => {
                                        table_saleproduct += "<tr>";
                                        table_saleproduct += "<td> Product Id : " + element
                                            .product_id + "</td>";
                                        table_saleproduct += "<td> Product Oder QTY : " + element
                                            .product_qty + "</td>";
                                        table_saleproduct += "</tr>";
                                    });
                                    table_saleproduct += "</table>";
                                    t.row.add([
                                        i.id,
                                        i.salebill[0].bill_username,
                                        i.salebill[0].bill_email,
                                        table_saleproduct,
                                        '$'+i.total_price,
                                    ]).draw(false);

                                }
                                // for (let i = 0; i < i.saleproduct.length; i++) {
                                //     console.log(i)
                                // }
                            }
                        });
                    }
                });
            }
        </script>
        <style>
            .PageLocation {
                display: contents;
            }

            .dt-button {
                color: #fff;
                background-color: #AE7529;
            }

        </style>
    @endsection
