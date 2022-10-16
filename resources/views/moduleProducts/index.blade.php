@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <style>
        .select2-search__field {
            width: 100% !important;
        }
    </style>

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
                    {{-- <a href="#colored-rounded-tab2" class="nav-link" data-toggle="tab"><button type="button" class="btn bg-indigo-400"><i class="icon-bubble-notification mr-2"></i>Add New Products</button></a> --}}
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
                            <li class="nav-item"><a href="#colored-rounded-tab1" id="tab1"
                                    class="nav-link active rounded-left" data-toggle="tab">All Products</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab2" id="tab2" class="nav-link"
                                    data-toggle="tab">Add
                                    New</a></li>
                            {{-- <li class="nav-item"><a href="#colored-rounded-tab3" id="tab3" class="nav-link"
                                data-toggle="tab">Brands</a></li> --}}
                            <li class="nav-item"><a href="#colored-rounded-tab4" id="tab4" class="nav-link"
                                    data-toggle="tab">Categories</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab5" id="tab5" class="nav-link"
                                    data-toggle="tab">Tags</a>
                            </li>
                            <li class="nav-item"><a href="#colored-rounded-tab6" id="tab6" class="nav-link"
                                    data-toggle="tab">Filter Attributes</a></li>
                            <li class="nav-item"><a href="#colored-rounded-tab7" id="tab7" class="nav-link"
                                    data-toggle="tab">Best Sellers</a></li>
                            {{-- <li class="nav-item"><a href="#colored-rounded-tab7" id="tab7" class="nav-link"
                                    data-toggle="tab">Import
                                    from Excel</a></li> --}}
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane fade  show" id="colored-rounded-tab7">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select name="best_sale_items" id="best_sale_items">
                                            @foreach ($ProductsBestSalesNot as $ProductsListitemBest)
                                                <option value="{{ $ProductsListitemBest->id }}">
                                                    {{ $ProductsListitemBest->id }} | {{ $ProductsListitemBest->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn" onclick="submitNewBestSale();">Add</button>
                                    </div>
                                </div>
                                <table id="Product_Table" class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Product Regular Price</th>
                                            <th>Product Type</th>
                                            <th>Status</th>
                                            <th>Remove From Best</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ProductsBestSales as $itemProductsBestSales)
                                            <tr>
                                                <td>{{ $itemProductsBestSales->id }}</td>
                                                <td>{{ $itemProductsBestSales->name }}</td>
                                                <td>{{ $itemProductsBestSales->g_regular_price }}</td>

                                                <td>

                                                    @if ($itemProductsBestSales->product_type == 'simple_product')
                                                        Offer Product
                                                    @elseif($itemProductsBestSales->product_type == 'offer_product')
                                                        Offer Product
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                                <td>

                                                    @if ($itemProductsBestSales->Inventory_Stock_status == 1 || $itemProductsBestSales->i_stock_quantity > 0)
                                                        <span class="badge bg-blue">In Stock</span>
                                                    @else<span class="badge bg-grey-400">Out of Stock</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn"
                                                        onclick="removeBestSale({{ $itemProductsBestSales->id }});">Remove</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade active show" id="colored-rounded-tab1">
                                <div class="responsive">
                                    <table id="Product_Table" class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Regular Price</th>
                                                <th>Product Type</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ProductsList as $itemProducts)
                                                <tr>
                                                    <td>{{ $itemProducts->id }}</td>
                                                    <td>{{ $itemProducts->name }}</td>
                                                    <td>{{ $itemProducts->g_regular_price }} $</td>

                                                    <td>
                                                        @if ($itemProducts->product_type == 'simple_product')
                                                            Simple Product
                                                        @elseif($itemProducts->product_type == 'offer_product')
                                                            Offer Product
                                                        @else
                                                            --
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $Sold_Products = 0;
                                                            $sale_items = 0;
                                                            if ($itemProducts->i_stock_quantity != null) {
                                                                $sale_items = $itemProducts->i_stock_quantity;
                                                            }
                                                            $sales = App\Models\SaleProduct::where('product_id', $itemProducts->id)->get();
                                                            
                                                            foreach ($sales as $key => $sale) {
                                                                $Sold_Products = +$sale->product_qty;
                                                            }
                                                            
                                                        @endphp
                                                        @if ($itemProducts->Inventory_Stock_status == 1 || $sale_items > $Sold_Products)
                                                            <span class="badge bg-blue">In Stock</span>
                                                        @else<span class="badge bg-grey-400">Out of Stock</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="editProduct_edit({{ $itemProducts }})">
                                                                    <i class="icon-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <form method="POST"
                                                                    action="{{ route('ModuleProducts/Product/delete') }}"
                                                                    class="delete_product">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <input type="text" name="pr_delete_id"
                                                                            id="br_delete_id{{ $itemProducts->id }}"
                                                                            value="{{ $itemProducts->id }}" hidden>
                                                                        <input type="submit"
                                                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user"
                                                                            value="Delete Product">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade " id="colored-rounded-tab2">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <form method="POST" action="{{ route('ModuleProducts/addProduct') }}"
                                            id="Add_Product_form" autocomplete="off" enctype="multipart/form-data">

                                            {{ csrf_field() }}
                                            <div class="card p-2">
                                                <div class=" row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input required type="text" id="product_name"
                                                                class="form-control" name="product_name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Product Type</label>
                                                            <select required filterPlaceholder="true" name="product_Type"
                                                                id="product_Type"
                                                                data-placeholder="Select a Product Brands..."
                                                                class="form-control select-search form-control-lg">
                                                                <option value="0">--Select a Product Type--</option>
                                                                <option value="simple_product">Simple Product</option>
                                                                <option value="offer_product">Offer Product</option>
                                                            </select>
                                                        </div>

                                                        <div class="d-lg-flex">
                                                            <ul
                                                                class="nav nav-tabs nav-tabs-vertical flex-column mr-lg-3 wmin-lg-200 mb-lg-0 border-bottom-0">
                                                                <li class="nav-item"><a href="#vertical-left-tab1"
                                                                        class="nav-link active" data-toggle="tab"><i
                                                                            class="icon-archive mr-2"></i> General</a></li>
                                                                <li class="nav-item"><a href="#vertical-left-tab2"
                                                                        class="nav-link" data-toggle="tab"><i
                                                                            class="icon-clipboard2 mr-2"></i> Inventory</a>
                                                                </li>
                                                                <li class="nav-item"><a href="#vertical-left-tab3"
                                                                        class="nav-link" data-toggle="tab"><i
                                                                            class="icon-truck mr-2"></i> Shipping</a></li>
                                                                <li class="nav-item"><a href="#vertical-left-tab4"
                                                                        class="nav-link" data-toggle="tab"><i
                                                                            class="icon-mention mr-2"></i> Advanced</a>
                                                                </li>
                                                                <li class="nav-item"><a href="#vertical-left-tab5"
                                                                        class="nav-link" data-toggle="tab"><i
                                                                            class="icon-filter3 mr-2"></i> Filters</a></li>
                                                            </ul>

                                                            <div class="tab-content flex-lg-fill">
                                                                <div class="tab-pane fade show active"
                                                                    id="vertical-left-tab1">

                                                                    <div class="form-group">
                                                                        <label>Regular Price</label>
                                                                        <input required type="number" id="Regular_price"
                                                                            class="form-control" name="Regular_price">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Sale Price <a style="color: rebeccapurple"
                                                                                class="schedule">
                                                                                (Schedule)</a></label>
                                                                        <input type="number" id="Sale_price"
                                                                            class="form-control" name="Sale_price">
                                                                    </div>

                                                                    <div id="schedule_section" class="form-group">
                                                                        <label>Sale Price Dates</label>
                                                                        <input type="date" id="schedule_date"
                                                                            class="form-control mb-1"
                                                                            name="schedule_date">
                                                                        <input type="time" id="schedule_time"
                                                                            class="form-control" name="schedule_time">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Sale Quantity</label>
                                                                        <input required type="number" id="Sale_quantity"
                                                                            class="form-control" name="Sale_quantity">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Sold Items</label>
                                                                        <input type="number" id="Sale_Items"
                                                                            class="form-control" name="Sale_Items">
                                                                    </div>

                                                                    <legend
                                                                        class="text-uppercase font-size-sm font-weight-bold">
                                                                    </legend>

                                                                    <div class="form-group">
                                                                        <label>Tax Status</label>
                                                                        <input type="number" id="Sale_status"
                                                                            class="form-control" name="Sale_status">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Tax Class</label>
                                                                        <input type="text" id="Sale_class"
                                                                            class="form-control" name="Sale_class">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Descriptions </label>
                                                                        <textarea id="description_product" class="summernote" name="description_product"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="vertical-left-tab2">
                                                                    <div class="form-group">
                                                                        <label>SKU</label>
                                                                        <input type="text" id="Inventory_SKU"
                                                                            class="form-control" name="Inventory_SKU">
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label>Manage Stock? </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            </label><input type="checkbox"
                                                                                id="Inventory_Manage_stock"
                                                                                class="form-control"
                                                                                name="Inventory_Manage_stock">Enable Stock
                                                                            management
                                                                            at product level
                                                                        </div>
                                                                    </div>
                                                                    <div id="Manage_stock_list1">
                                                                        <div class="form-group">
                                                                            <label>Stock Quantity</label>
                                                                            <input type="number"
                                                                                id="Inventory_Stock_quantity"
                                                                                class="form-control"
                                                                                name="Inventory_Stock_quantity">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Allow backorders?</label>
                                                                            <select filterPlaceholder="true"
                                                                                name="Inventory_Allow_backorders"
                                                                                id="Inventory_Allow_backorders"
                                                                                data-placeholder="Allow backorders"
                                                                                class="form-control select-search form-control-lg">
                                                                                <option value="0">--Select a Product
                                                                                    Type--
                                                                                </option>
                                                                                <option value="1">DO Not Allow
                                                                                </option>
                                                                                <option value="2">Allow, but notify
                                                                                    customer
                                                                                </option>
                                                                                <option value="3">Allow
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Low Stock threshold</label>
                                                                            <input type="number"
                                                                                id="Inventory_Low_stock_threshold"
                                                                                class="form-control"
                                                                                name="Inventory_Low_stock_threshold">
                                                                        </div>
                                                                    </div>

                                                                    <div id="Manage_stock_list2">
                                                                        <div class="form-group">
                                                                            <label>Stock Status</label>
                                                                            <select filterPlaceholder="true"
                                                                                name="Inventory_Stock_status"
                                                                                id="Inventory_Stock_status"
                                                                                data-placeholder="Stock Status"
                                                                                class="form-control select-search form-control-lg">
                                                                                <option value="1">In Stock</option>
                                                                                <option value="2">Out of Stock
                                                                                </option>
                                                                                <option value="3">On backorder
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label>Sold Individually</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            </label><input type="checkbox"
                                                                                id="Inventory_Sold_individually"
                                                                                class="form-control"
                                                                                name=" Inventory_Sold_individually">
                                                                            Enable this to only allow one of this item to be
                                                                            bought in a single order
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Max Quantity per Order</label>
                                                                        <input type="text"
                                                                            id="Inventory_Max_Quantity_Per_Order"
                                                                            class="form-control"
                                                                            name="Inventory_Max_Quantity_Per_Order">
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="vertical-left-tab3">
                                                                    <div class="form-group">
                                                                        <label>Weight (kg)</label>
                                                                        <input type="text" id="Shipping_Weight"
                                                                            class="form-control" name="Shipping_Weight">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <label>Dimensions (cm)</label>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="text"
                                                                                id="Shipping_Max_Quantity_Per_Order_Length"
                                                                                placeholder="Length" class="form-control"
                                                                                name="Shipping_Max_Quantity_Per_Order_Length">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="text"
                                                                                id="Shipping_Max_Quantity_Per_Order_Width"
                                                                                placeholder="Width" class="form-control"
                                                                                name="Shipping_Max_Quantity_Per_Order_Width">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input type="text"
                                                                                id="Shipping_Max_Quantity_Per_Order_Height"
                                                                                placeholder="Height" class="form-control"
                                                                                name="Shipping_Max_Quantity_Per_Order_Height">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="vertical-left-tab4">
                                                                    <div class="form-group">
                                                                        <label>Purchase note</label>
                                                                        <input type="text" id="Adv_Purchase_note"
                                                                            class="form-control" name="Adv_Purchase_note">
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="vertical-left-tab5">

                                                                    <div class="form-group">
                                                                        <label>Appellations</label>
                                                                        <select filterPlaceholder="true"
                                                                            name="Appellations" id="Appellations"
                                                                            data-placeholder="Select a Product Appellations..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsAttributes = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Appellations')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsAttributes as $AppellationsAttributesItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsAttributesItems->id }}">
                                                                                    {{ $AppellationsAttributesItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsAttributesItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <select filterPlaceholder="true" name="Country"
                                                                            id="Country"
                                                                            data-placeholder="Select a Product Country..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsCountry = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Country')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsCountry as $AppellationsCountryItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsCountryItems->id }}">
                                                                                    {{ $AppellationsCountryItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsCountryItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Producer</label>
                                                                        <select filterPlaceholder="true" name="Producer"
                                                                            id="Producer"
                                                                            data-placeholder="Select a Product Producer..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsProducer = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Producer')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsProducer as $AppellationsProducerItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsProducerItems->id }}">
                                                                                    {{ $AppellationsProducerItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsProducerItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Varietals</label>
                                                                        <select filterPlaceholder="true" name="Varietals"
                                                                            id="Varietals"
                                                                            data-placeholder="Select a Product Varietals..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsVarietals = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Varietals')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsVarietals as $AppellationsVarietalsItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsVarietalsItems->id }}">
                                                                                    {{ $AppellationsVarietalsItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsVarietalsItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Type/Category</label>
                                                                        <select filterPlaceholder="true"
                                                                            name="Type_Category" id="Type_Category"
                                                                            data-placeholder="Select a Product Type/Category..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsType_Category = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Type_Category')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsType_Category as $AppellationsType_CategoryItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsType_CategoryItems->id }}">
                                                                                    {{ $AppellationsType_CategoryItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsType_CategoryItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Format</label>
                                                                        <select filterPlaceholder="true" name="Format"
                                                                            id="Format"
                                                                            data-placeholder="Select a Product Format..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsFormat = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Format')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsFormat as $AppellationsFormatItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsFormatItems->id }}">
                                                                                    {{ $AppellationsFormatItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsFormatItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Colour</label>
                                                                        <select filterPlaceholder="true" name="Colour"
                                                                            id="Colour"
                                                                            data-placeholder="Select a Product Colour..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsColour = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Colour')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsColour as $AppellationsColourItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsColourItems->id }}">
                                                                                    {{ $AppellationsColourItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsColourItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Environment</label>
                                                                        <select filterPlaceholder="true"
                                                                            name="Environment" id="Environment"
                                                                            data-placeholder="Select a Product Environment..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsEnvironment = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Environment')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsEnvironment as $AppellationsEnvironmentItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsEnvironmentItems->id }}">
                                                                                    {{ $AppellationsEnvironmentItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsEnvironmentItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Rice Type</label>
                                                                        <select filterPlaceholder="true" name="Rice_Type"
                                                                            id="Rice_Type"
                                                                            data-placeholder="Select a Product Rice Type..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsRice_Type = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Rice_Type')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsRice_Type as $AppellationsRice_TypeItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsRice_TypeItems->id }}">
                                                                                    {{ $AppellationsRice_TypeItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsRice_TypeItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Rice Polishing Rate</label>
                                                                        <select filterPlaceholder="true"
                                                                            name="Rice_Polishing_Rate"
                                                                            id="Rice_Polishing_Rate"
                                                                            data-placeholder="Select a Product Rice Polishing Rate..."
                                                                            class="form-control select-search form-control-lg">
                                                                            <option value="">--</option>
                                                                            @php
                                                                                $AppellationsRice_Polishing_Rate = \App\Models\ProductsAttributes::where('status', 1)
                                                                                    ->where('attributes_Type', 'Rice_Polishing_Rate')
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($AppellationsRice_Polishing_Rate as $AppellationsRice_Polishing_RateItems)
                                                                                <option required
                                                                                    value="{{ $AppellationsRice_Polishing_RateItems->id }}">
                                                                                    {{ $AppellationsRice_Polishing_RateItems->atributes_ }}
                                                                                    |
                                                                                    {{ $AppellationsRice_Polishing_RateItems->cat_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card p-2">
                                                <div class=" row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Product Brands </label>
                                                            <select filterPlaceholder="true" multiple
                                                                name="Brands_Product_list[]" id="Brands_Product_list"
                                                                data-placeholder="Select a Product Brands..."
                                                                class="form-control select-search form-control-lg">
                                                                @php
                                                                    $ProductsBrands = \App\Models\ProductsBrands::where('status', 1)->get();
                                                                @endphp
                                                                @foreach ($ProductsBrands as $ProductsBrand)
                                                                    <option required value="{{ $ProductsBrand->id }}">
                                                                        {{ $ProductsBrand->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Product Categories </label>
                                                            <select filterPlaceholder="true" multiple
                                                                name="Brands_Categories_list[]"
                                                                id="Brands_Categories_list"
                                                                data-placeholder="Select a Product Categories..."
                                                                class="form-control select-search form-control-lg">
                                                                @php
                                                                    $ProductsCategory = \App\Models\ProductsCategory::where('status', 1)->get();
                                                                @endphp
                                                                @foreach ($ProductsCategory as $ProductCategory)
                                                                    <option required value="{{ $ProductCategory->id }}">
                                                                        {{ $ProductCategory->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Product Tags </label>
                                                            <select filterPlaceholder="true" multiple="multiple"
                                                                name="Brands_Tag_list[]" id="Brands_Tag_list"
                                                                data-placeholder="Select a Product Tags..."
                                                                class="form-control select ">
                                                                @php
                                                                    $ProductsTag = \App\Models\ProductsTag::where('status', 1)->get();
                                                                @endphp
                                                                @foreach ($ProductsTag as $ProductTag)
                                                                    <option required value="{{ $ProductTag->id }}">
                                                                        {{ $ProductTag->tag_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                    </div>
                                                </div>

                                            </div>






                                            <div class="form-group">
                                                <label>Product Thumbnail Image </label>
                                                <input type="file" id="product_thumbnail_image" class="form-control"
                                                    name="product_thumbnail_image">
                                            </div>

                                            <div class="form-group">
                                                <label>Product Thumbnail Image Best Seller</label>
                                                <input type="file" id="product_thumbnail_image_best_seller"
                                                    class="form-control" name="product_thumbnail_image_best_seller">
                                            </div>

                                            <div class="form-group">

                                                <div id="product_images">
                                                    <div id="inputSet_1" class="row m-1">
                                                        <label class="col-sm-3 text-left my-auto">Product Image</label>
                                                        <input type="file" id="products_image1"
                                                            class="form-control col-sm-7" name="products_image[]">
                                                        <button id="removeImage_1" onclick="removeImage(1);"
                                                            class="btn btn-primary  ml-3"><i class="icon-close2"></i>
                                                            Remove</button>
                                                    </div>

                                                </div>
                                                <a id="addNewImage" style="color:#fff" class="btn btn-primary m-1 "><i
                                                        class="icon-add"></i> Add</a>
                                            </div>



                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Add New Product<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab3">
                                <div class="row">
                                    <div class="col-sm-8 card ml-4">
                                        <div class="responsive">
                                            <table id="Brands_Table" class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>Brands ID</th>
                                                        <th>Brands Name</th>
                                                        <th>Brands Image</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($BrandsList as $itemBrands)
                                                        <tr>
                                                            <td>{{ $itemBrands->id }}</td>
                                                            <td>{{ $itemBrands->name }}</td>
                                                            <td>
                                                                @if ($itemBrands->img)
                                                                    <img src="{{ asset('storage') }}/{{ $itemBrands->img }}"
                                                                        width="65px" alt="">
                                                            </td>
                                                    @endif
                                                    <td>
                                                        @if ($itemBrands->status == 1)
                                                            <span class="badge bg-blue">Active</span>
                                                        @elseif($itemBrands->status == 0)
                                                            <span class="badge bg-danger">Block</span>
                                                        @elseif($itemBrands->status == 2)
                                                            <span class="badge bg-grey-400">Suspended</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="editBrands({{ $itemBrands->id }},'{{ $itemBrands->name }}')">
                                                                    <i class="icon-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <button onclick="deleteBrand({{ $itemBrands->id }});"
                                                                    class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user">Delete
                                                                    Brand</button>
                                                                {{-- <form method="POST"
                                                                action="{{ route('ModuleProducts/Brands/delete') }}"
                                                                class="delete_barnds">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <input type="text" name="br_delete_id"
                                                                        id="br_delete_id{{ $itemBrands->id }}"
                                                                        value="{{ $itemBrands->id }}" hidden>
                                                                    <input type="submit"
                                                                        class=""
                                                                        value="Delete User">
                                                                </div>
                                                            </form> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 card ml-4">
                                        <form method="POST" action="{{ route('ModuleProducts/Brands/add') }}"
                                            id="Add_Brands_form" autocomplete="off" enctype="multipart/form-data">

                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label>Brands Name</label>
                                                <input required type="text" id="brands_name" class="form-control"
                                                    name="brands_name">
                                            </div>

                                            <div class="form-group">
                                                <label>Brands Image </label>
                                                <input type="file" id="brands_image" class="form-control"
                                                    name="brands_image">
                                            </div>

                                            <div class="form-group">
                                                <label>Brands Banner Image </label>
                                                <input type="file" id="Brands_banner_image" class="form-control"
                                                    name="Brands_banner_image">
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Add Brands<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab4">
                                <div class="row">
                                    <div class="col-sm-8 card ml-4">
                                        <div class="responsive">
                                            <table id="Brands_Table" class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>Category ID</th>
                                                        <th>Category Name</th>
                                                        {{-- <th>Category Parent</th> --}}
                                                        <th>Category Image</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($CategoryList as $itemCategory)
                                                        <tr>
                                                            <td>{{ $itemCategory->id }}</td>
                                                            <td>{{ $itemCategory->name }}</td>
                                                            {{-- <td>
                                                            @php
                                                                $value = \App\Models\ProductsCategory::select('name')->find($itemCategory->parent);
                                                                
                                                            @endphp
                                                            {{ $value['name'] }}

                                                        </td> --}}
                                                            <td>
                                                                @if ($itemCategory->img)
                                                                    <img src="{{ asset('storage') }}/{{ $itemCategory->img }}"
                                                                        width="65px" alt="">
                                                            </td>
                                                    @endif
                                                    <td>
                                                        @if ($itemCategory->status == 1)
                                                            <span class="badge bg-blue">Active</span>
                                                        @elseif($itemCategory->status == 0)
                                                            <span class="badge bg-danger">Block</span>
                                                        @elseif($itemCategory->status == 2)
                                                            <span class="badge bg-grey-400">Suspended</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <a href="#"
                                                                    class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                    onclick="editCategory({{ $itemCategory->id }},'{{ $itemCategory->name }}')">
                                                                    <i class="icon-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-4">
                                                                <form method="POST" class="delete_Category"
                                                                    action="{{ route('ModuleProducts/Category/delete') }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <input type="text" name="cat_delete_id"
                                                                            id="cat_delete_id{{ $itemCategory->id }}"
                                                                            value="{{ $itemCategory->id }}" hidden>
                                                                        <input type="submit"
                                                                            class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user"
                                                                            value="Delete User">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 card ml-4">
                                        <form method="POST" action="{{ route('ModuleProducts/Category/add') }}"
                                            id="Add_Category_form" autocomplete="off" enctype="multipart/form-data">

                                            {{ csrf_field() }}


                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input required type="text" id="Category_name" class="form-control"
                                                    name="Category_name">
                                            </div>

                                            <div class="form-group">
                                                <label>If Child Category (Check Parent) </label>
                                                <select filterPlaceholder="true" name="Parent_Category_id"
                                                    id="Parent_Category_id"
                                                    class="form-control select-search form-control-lg">
                                                    <option value="">--Select Category--</option>
                                                    @php
                                                        $ProductCategory = \App\Models\ProductsCategory::where('parent', null)->get();
                                                    @endphp
                                                    @foreach ($ProductCategory as $ProductCategory)
                                                        <option required value="{{ $ProductCategory->id }}">
                                                            {{ $ProductCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Category Image </label>
                                                <input type="file" id="Category_image" class="form-control"
                                                    name="Category_image">
                                            </div>

                                            <div class="form-group">
                                                <label>Category Banner Image </label>
                                                <input type="file" id="Category_Banner_image" class="form-control"
                                                    name="Category_Banner_image">
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Add Category<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab5">
                                <div class="row">
                                    <div class="col-sm-8 card ml-4">
                                        <div class="responsive">
                                            <table id="Brands_Table" class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>Tag ID</th>
                                                        <th>Tag Name</th>
                                                        <th>Tag</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Tag as $itemTag)
                                                        <tr>
                                                            <td>{{ $itemTag->id }}</td>
                                                            <td>{{ $itemTag->tag_name }}</td>

                                                            <td>{{ $itemTag->tag }}</td>
                                                            <td>
                                                                @if ($itemTag->status == 1)
                                                                    <span class="badge bg-blue">Active</span>
                                                                @elseif($itemTag->status == 0)
                                                                    <span class="badge bg-danger">Block</span>
                                                                @elseif($itemTag->status == 2)
                                                                    <span class="badge bg-grey-400">Suspended</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <a href="#"
                                                                            class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                            onclick="editTag({{ $itemTag->id }},'{{ $itemTag->tag_name }}','{{ $itemTag->tag }}')">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <form method="POST" class="delete_Tag"
                                                                            action="{{ route('ModuleProducts/Tag/delete') }}">
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                                <input type="text" name="tag_delete_id"
                                                                                    id="tag_delete_id{{ $itemTag->id }}"
                                                                                    value="{{ $itemTag->id }}" hidden>
                                                                                <input type="submit"
                                                                                    class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user"
                                                                                    value="Delete User">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 card ml-4">
                                        <form method="POST" action="{{ route('ModuleProducts/Tag/add') }}"
                                            id="Add_Tag_form" autocomplete="off" enctype="multipart/form-data">

                                            {{ csrf_field() }}


                                            <div class="form-group">
                                                <label>Tag Name</label>
                                                <input required type="text" id="tag_name" class="form-control"
                                                    name="tag_name">
                                            </div>



                                            <div class="form-group">
                                                <label>Tag </label>
                                                <input required type="text" id="tag" class="form-control"
                                                    name="tag">
                                            </div>


                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Add Tag<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab6">
                                <div class="row">
                                    <div class="col-sm-8 card ml-4">
                                        <div class="responsive">
                                            <table id="Brands_Table" class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>Attributes Filter ID</th>
                                                        <th>Category No</th>
                                                        <th>Filter Type</th>
                                                        <th>Attributes</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Attributes as $itemAttributes)
                                                        <tr>
                                                            <td>{{ $itemAttributes->id }}</td>
                                                            <td>{{ $itemAttributes->attributes_cat_name }}</td>

                                                            <td>{{ $itemAttributes->attributes_Type }}</td>
                                                            <td>{{ $itemAttributes->atributes_ }}</td>
                                                            <td>
                                                                @if ($itemAttributes->status == 1)
                                                                    <span class="badge bg-blue">Active</span>
                                                                @elseif($itemAttributes->status == 0)
                                                                    <span class="badge bg-danger">Block</span>
                                                                @elseif($itemAttributes->status == 2)
                                                                    <span class="badge bg-grey-400">Suspended</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <a href="#"
                                                                            class="btn bg-success-400 rounded-round btn-icon btn-sm "
                                                                            onclick="editAttributes({{ $itemAttributes->id }},'{{ $itemAttributes->attributes_cat_name }}','{{ $itemAttributes->attributes_Type }}','{{ $itemAttributes->atributes_ }}')">
                                                                            <i class="icon-pencil"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <form method="POST" class="delete_Attributes"
                                                                            action="{{ route('ModuleProducts/Attributes/delete') }}">
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                                <input type="text"
                                                                                    name="Attributes_delete_id"
                                                                                    id="Attributes_delete_id{{ $itemAttributes->id }}"
                                                                                    value="{{ $itemAttributes->id }}"
                                                                                    hidden>
                                                                                <input type="submit"
                                                                                    class="btn bg-pink-400 rounded-round btn-icon btn-sm delete-user"
                                                                                    value="Delete User">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 card ml-4">
                                        <form method="POST" action="{{ route('ModuleProducts/Attributes/add') }}"
                                            id="add_attributes_form" autocomplete="off" enctype="multipart/form-data">

                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Filter Categories </label>
                                                <select filterPlaceholder="true" name="attributes_cat_name"
                                                    id="attributes_cat_name"
                                                    data-placeholder="Select a Product Categories..."
                                                    class="form-control select-search form-control-lg">
                                                    @php
                                                        $ProductsCategory = \App\Models\ProductsCategory::where('status', 1)->get();
                                                    @endphp
                                                    @foreach ($ProductsCategory as $ProductCategory)
                                                        <option required value="{{ $ProductCategory->id }}">
                                                            {{ $ProductCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Filter Type</label>
                                                <select filterPlaceholder="true" name="attributes_Type"
                                                    id="attributes_Type" data-placeholder="Select a Product Categories..."
                                                    class="form-control select-search form-control-lg">
                                                    <option value="Appellations">Appellations</option>
                                                    <option value="Country">Country</option>
                                                    <option value="Producer">Producer</option>
                                                    <option value="Varietals">Varietals</option>
                                                    <option value="Type_Category">Type/Category</option>
                                                    <option value="Format">Format</option>
                                                    <option value="Colour">Colour</option>
                                                    <option value="Environment">Environment</option>
                                                    <option value="Rice_Type">Rice Type</option>
                                                    <option value="Rice_Polishing_Rate ">Rice Polishing Rate </option>
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>Filter Attributes </label>
                                                <input required type="text" id="atributes_" class="form-control"
                                                    name="atributes_">
                                            </div>


                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Add Attributes<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="colored-rounded-tab7">
                                Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthet.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="modal_large_editBrands" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Brands </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModuleProducts/Brands/edit') }}" id="Add_Brands_form_edit"
                        autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="text" hidden name="id_edit_brands" id="id_edit_brands">
                        <div class="form-group">
                            <label>Brands Name</label>
                            <input required type="text" id="brands_name_edit" class="form-control"
                                name="brands_name_edit">
                        </div>

                        <div class="form-group">
                            <label>Brands Image </label>
                            <input type="file" id="brands_image_edit" class="form-control" name="brands_image_edit">
                        </div>

                        <div class="form-group">
                            <label>Brands Banner Image </label>
                            <input type="file" id="Brands_banner_image_edit" class="form-control"
                                name="Brands_banner_image_edit">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add Brands<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_large_editCategory" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModuleProducts/Category/edit') }}"
                        id="Add_Category_form_edit" autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="text" hidden name="id_edit_Category" id="id_edit_Category">

                        <div class="form-group">
                            <label>Category Name</label>
                            <input required type="text" id="Category_name_edit" class="form-control"
                                name="Category_name_edit">
                        </div>

                        <div class="form-group">
                            <label>If Child Category (Check Parent) </label>
                            <select filterPlaceholder="true" name="Parent_Category_id_edit" id="Parent_Category_id_edit"
                                class="form-control select-search form-control-lg">
                                <option value="">--Select Category--</option>
                                @php
                                    $ProductCategory = \App\Models\ProductsCategory::where('parent', null)->get();
                                @endphp
                                @foreach ($ProductCategory as $ProductCategory)
                                    <option required value="{{ $ProductCategory->id }}">
                                        {{ $ProductCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category Image </label>
                            <input type="file" id="Category_image_edit" class="form-control"
                                name="Category_image_edit">
                        </div>

                        <div class="form-group">
                            <label>Category Banner Image </label>
                            <input type="file" id="Category_Banner_image_edit" class="form-control"
                                name="Category_Banner_image_edit">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add Category<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_large_editTag" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Tag </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModuleProducts/Tag/edit') }}" id="edit_Tag_form"
                        autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="text" hidden name="id_edit_tag" id="id_edit_tag">


                        <div class="form-group">
                            <label>Tag Name</label>
                            <input required type="text" id="tag_name_edit" class="form-control" name="tag_name_edit">
                        </div>



                        <div class="form-group">
                            <label>Tag</label>
                            <input required type="text" id="tag_edit" class="form-control" name="tag_edit">
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add Tag<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_large_editAttributes" class="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Attributes </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModuleProducts/Attributes/edit') }}"
                        id="edit_attributes_form" autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="text" hidden name="id_edit_attributes" id="id_edit_attributes">

                        <div class="form-group">
                            <label>Filter Categories </label>
                            <select filterPlaceholder="true" name="attributes_cat_name_edit"
                                id="attributes_cat_name_edit" data-placeholder="Select a Product Categories..."
                                class="form-control select-search form-control-lg">
                                @php
                                    $ProductsCategory = \App\Models\ProductsCategory::where('status', 1)->get();
                                @endphp
                                @foreach ($ProductsCategory as $ProductCategory)
                                    <option required value="{{ $ProductCategory->id }}">
                                        {{ $ProductCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Filter Type</label>
                            <select filterPlaceholder="true" name="attributes_Type_edit" id="attributes_Type_edit"
                                data-placeholder="Select a Product Categories..."
                                class="form-control select-search form-control-lg">
                                <option value="Appellations">Appellations</option>
                                <option value="Country">Country</option>
                                <option value="Producer">Producer</option>
                                <option value="Varietals">Varietals</option>
                                <option value="Type_Category">Type/Category</option>
                                <option value="Format">Format</option>
                                <option value="Colour">Colour</option>
                                <option value="Environment">Environment</option>
                                <option value="Rice_Type">Rice Type</option>
                                <option value="Rice_Polishing_Rate ">Rice Polishing Rate </option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Filter Attributes </label>
                            <input required type="text" id="atributes_edit" class="form-control"
                                name="atributes_edit">
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add Attributes<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_large_editProduct" class="modal">
        <div class="modal-dialog modal-lg" style="max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('ModuleProducts/Product/editProduct') }}"
                        id="edit_Product_form" autocomplete="off" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="card p-2">
                            <div class=" row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input required type="text" id="product_name_edit" class="form-control"
                                            name="product_name">
                                    </div>
                                    <input type="hidden" name="product_id" id="product_id">
                                    <div class="form-group">
                                        <label>Product Type</label>
                                        <select required filterPlaceholder="true" name="product_Type"
                                            id="product_Type_edit" data-placeholder="Select a Product Brands..."
                                            class="form-control select-search form-control-lg">
                                            <option value="simple_product">Simple Product</option>
                                            <option value="offer_product">Offer Product</option>
                                        </select>
                                    </div>

                                    <div class="d-lg-flex">
                                        <ul
                                            class="nav nav-tabs nav-tabs-vertical flex-column mr-lg-3 wmin-lg-200 mb-lg-0 border-bottom-0">
                                            <li class="nav-item"><a href="#vertical-left-tab1_edit"
                                                    class="nav-link active" data-toggle="tab"><i
                                                        class="icon-archive mr-2"></i> General</a></li>
                                            <li class="nav-item"><a href="#vertical-left-tab2_edit" class="nav-link"
                                                    data-toggle="tab"><i class="icon-clipboard2 mr-2"></i> Inventory</a>
                                            </li>
                                            <li class="nav-item"><a href="#vertical-left-tab3_edit" class="nav-link"
                                                    data-toggle="tab"><i class="icon-truck mr-2"></i> Shipping</a></li>
                                            <li class="nav-item"><a href="#vertical-left-tab4_edit" class="nav-link"
                                                    data-toggle="tab"><i class="icon-mention mr-2"></i> Advanced</a></li>
                                            <li class="nav-item"><a href="#vertical-left-tab5_edit" class="nav-link"
                                                    data-toggle="tab"><i class="icon-filter3 mr-2"></i> Filters</a></li>
                                        </ul>

                                        <div class="tab-content flex-lg-fill">
                                            <div class="tab-pane fade show active" id="vertical-left-tab1_edit">

                                                <div class="form-group">
                                                    <label>Regular Price</label>
                                                    <input required type="number" id="Regular_price_edit"
                                                        class="form-control" name="Regular_price">
                                                </div>

                                                <div class="form-group">
                                                    <label>Sale Price <a href="#" class="schedule_edit">
                                                            (Schedule)</a></label>
                                                    <input type="number" id="Sale_price_edit" class="form-control"
                                                        name="Sale_price">
                                                </div>

                                                <div id="schedule_section_edit" class="form-group">
                                                    <label>Sale Price Dates</label>
                                                    <input type="date" id="schedule_date_edit"
                                                        class="form-control mb-1" name="schedule_date">
                                                    <input type="time" id="schedule_time_edit" class="form-control"
                                                        name="schedule_time">
                                                </div>

                                                <div class="form-group">
                                                    <label>Sale Quantity</label>
                                                    <input required type="number" id="Sale_quantity_edit"
                                                        class="form-control" name="Sale_quantity">
                                                </div>

                                                <div class="form-group">
                                                    <label>Sold Items</label>
                                                    <input type="number" id="Sale_Items_edit" class="form-control"
                                                        name="Sale_Items">
                                                </div>

                                                <legend class="text-uppercase font-size-sm font-weight-bold">
                                                </legend>

                                                <div class="form-group">
                                                    <label>Tax Status</label>
                                                    <input type="number" id="Sale_status_edit" class="form-control"
                                                        name="Sale_status">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tax class</label>
                                                    <input type="text" id="Sale_class_edit" class="form-control"
                                                        name="Sale_class">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="vertical-left-tab2_edit">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input type="text" id="Inventory_SKU_edit" class="form-control"
                                                        name="Inventory_SKU">
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label>Manage Stock? </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        </label><input type="checkbox" id="Inventory_Manage_stock_edit"
                                                            class="form-control" name="Inventory_Manage_stock">Enable
                                                        Stock
                                                        management
                                                        at product level
                                                    </div>
                                                </div>
                                                <div id="Manage_stock_list1">
                                                    <div class="form-group">
                                                        <label>Stock Quantity</label>
                                                        <input type="number" id="Inventory_Stock_quantity_edit"
                                                            class="form-control" name="Inventory_Stock_quantity">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Allow backorders?</label>
                                                        <select filterPlaceholder="true" name="Inventory_Allow_backorders"
                                                            id="Inventory_Allow_backorders_edit"
                                                            data-placeholder="Allow backorders"
                                                            class="form-control select-search form-control-lg">
                                                            <option value="0">--Select a Product Type--</option>
                                                            <option value="1">DO Not Allow</option>
                                                            <option value="2">Allow, but notify customer</option>
                                                            <option value="3">Allow
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Low Stock threshold</label>
                                                        <input type="number" id="Inventory_Low_stock_threshold_edit"
                                                            class="form-control" name="Inventory_Low_stock_threshold">
                                                    </div>
                                                </div>

                                                <div id="Manage_stock_list2">
                                                    <div class="form-group">
                                                        <label>Stock Status</label>
                                                        <select filterPlaceholder="true" name="Inventory_Stock_status"
                                                            id="Inventory_Stock_status_edit"
                                                            data-placeholder="Stock Status"
                                                            class="form-control select-search form-control-lg">
                                                            <option value="1">In Stock</option>
                                                            <option value="2">Out of Stock</option>
                                                            <option value="3">On backorder</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label>Sold Individually</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        </label><input type="checkbox"
                                                            id="Inventory_Sold_individually_edit" class="form-control"
                                                            name="Inventory_Sold_individually">
                                                        Enable this to only allow one of this item to be
                                                        bought in a single order
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Max Quantity Per Order</label>
                                                    <input type="text" id="Inventory_Max_Quantity_Per_Order_edit"
                                                        class="form-control" name="Inventory_Max_Quantity_Per_Order">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="vertical-left-tab3_edit">
                                                <div class="form-group">
                                                    <label>Weight (kg)</label>
                                                    <input type="text" id="Shipping_Weight_edit" class="form-control"
                                                        name="Shipping_Weight">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label>Dimensions (cm)</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text"
                                                            id="Shipping_Max_Quantity_Per_Order_Length_edit"
                                                            placeholder="Length" class="form-control"
                                                            name="Shipping_Max_Quantity_Per_Order_Length">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text"
                                                            id="Shipping_Max_Quantity_Per_Order_Width_edit"
                                                            placeholder="Width" class="form-control"
                                                            name="Shipping_Max_Quantity_Per_Order_Width">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text"
                                                            id="Shipping_Max_Quantity_Per_Order_Height_edit"
                                                            placeholder="Height" class="form-control"
                                                            name="Shipping_Max_Quantity_Per_Order_Height">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="vertical-left-tab4_edit">
                                                <div class="form-group">
                                                    <label>Purchase note</label>
                                                    <input type="text" id="Adv_Purchase_note_edit"
                                                        class="form-control" name="Adv_Purchase_note">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="vertical-left-tab5_edit">

                                                <div class="form-group">
                                                    <label>Appellations</label>
                                                    <select filterPlaceholder="true" name="Appellations"
                                                        id="Appellations_edit"
                                                        data-placeholder="Select a Product Appellations..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsAttributes = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Appellations')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsAttributes as $AppellationsAttributesItems)
                                                            <option required
                                                                value="{{ $AppellationsAttributesItems->id }}">
                                                                {{ $AppellationsAttributesItems->atributes_ }} |
                                                                {{ $AppellationsAttributesItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select filterPlaceholder="true" name="Country" id="Country_edit"
                                                        data-placeholder="Select a Product Country..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsCountry = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Country')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsCountry as $AppellationsCountryItems)
                                                            <option required
                                                                value="{{ $AppellationsCountryItems->id }}">
                                                                {{ $AppellationsCountryItems->atributes_ }} |
                                                                {{ $AppellationsCountryItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Producer</label>
                                                    <select filterPlaceholder="true" name="Producer"
                                                        id="Producer_edit"
                                                        data-placeholder="Select a Product Producer..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsProducer = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Producer')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsProducer as $AppellationsProducerItems)
                                                            <option required
                                                                value="{{ $AppellationsProducerItems->id }}">
                                                                {{ $AppellationsProducerItems->atributes_ }} |
                                                                {{ $AppellationsProducerItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Varietals</label>
                                                    <select filterPlaceholder="true" name="Varietals"
                                                        id="Varietals_edit"
                                                        data-placeholder="Select a Product Varietals..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsVarietals = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Varietals')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsVarietals as $AppellationsVarietalsItems)
                                                            <option required
                                                                value="{{ $AppellationsVarietalsItems->id }}">
                                                                {{ $AppellationsVarietalsItems->atributes_ }} |
                                                                {{ $AppellationsVarietalsItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Type/Category</label>
                                                    <select filterPlaceholder="true" name="Type_Category"
                                                        id="Type_Category_edit"
                                                        data-placeholder="Select a Product Type/Category..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsType_Category = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Type_Category')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsType_Category as $AppellationsType_CategoryItems)
                                                            <option required
                                                                value="{{ $AppellationsType_CategoryItems->id }}">
                                                                {{ $AppellationsType_CategoryItems->atributes_ }} |
                                                                {{ $AppellationsType_CategoryItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Format</label>
                                                    <select filterPlaceholder="true" name="Format" id="Format_edit"
                                                        data-placeholder="Select a Product Format..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsFormat = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Format')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsFormat as $AppellationsFormatItems)
                                                            <option required value="{{ $AppellationsFormatItems->id }}">
                                                                {{ $AppellationsFormatItems->atributes_ }} |
                                                                {{ $AppellationsFormatItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Colour</label>
                                                    <select filterPlaceholder="true" name="Colour" id="Colour_edit"
                                                        data-placeholder="Select a Product Colour..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsColour = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Colour')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsColour as $AppellationsColourItems)
                                                            <option required value="{{ $AppellationsColourItems->id }}">
                                                                {{ $AppellationsColourItems->atributes_ }} |
                                                                {{ $AppellationsColourItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Environment</label>
                                                    <select filterPlaceholder="true" name="Environment"
                                                        id="Environment_edit"
                                                        data-placeholder="Select a Product Environment..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsEnvironment = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Environment')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsEnvironment as $AppellationsEnvironmentItems)
                                                            <option required
                                                                value="{{ $AppellationsEnvironmentItems->id }}">
                                                                {{ $AppellationsEnvironmentItems->atributes_ }} |
                                                                {{ $AppellationsEnvironmentItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rice Type</label>
                                                    <select filterPlaceholder="true" name="Rice_Type"
                                                        id="Rice_Type_edit"
                                                        data-placeholder="Select a Product Rice Type..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsRice_Type = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Rice_Type')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsRice_Type as $AppellationsRice_TypeItems)
                                                            <option required
                                                                value="{{ $AppellationsRice_TypeItems->id }}">
                                                                {{ $AppellationsRice_TypeItems->atributes_ }} |
                                                                {{ $AppellationsRice_TypeItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rice Polishing Rate</label>
                                                    <select filterPlaceholder="true" name="Rice_Polishing_Rate"
                                                        id="Rice_Polishing_Rate_edit"
                                                        data-placeholder="Select a Product Rice Polishing Rate..."
                                                        class="form-control select-search form-control-lg">
                                                        <option value="">--</option>
                                                        @php
                                                            $AppellationsRice_Polishing_Rate = \App\Models\ProductsAttributes::where('status', 1)
                                                                ->where('attributes_Type', 'Rice_Polishing_Rate')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($AppellationsRice_Polishing_Rate as $AppellationsRice_Polishing_RateItems)
                                                            <option required
                                                                value="{{ $AppellationsRice_Polishing_RateItems->id }}">
                                                                {{ $AppellationsRice_Polishing_RateItems->atributes_ }}
                                                                | {{ $AppellationsRice_Polishing_RateItems->cat_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Product Descriptions </label>
                                        <textarea id="description_product_edit" class="" name="description_product"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-2">
                            <div class=" row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Brands </label>
                                        <select filterPlaceholder="true" multiple name="Brands_Product_list[]"
                                            id="Brands_Product_list_edit" data-placeholder="Select a Product Brands..."
                                            class="form-control select-search form-control-lg">
                                            @php
                                                $ProductsBrands = \App\Models\ProductsBrands::where('status', 1)->get();
                                            @endphp
                                            @foreach ($ProductsBrands as $ProductsBrand)
                                                <option required value="{{ $ProductsBrand->id }}">
                                                    {{ $ProductsBrand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Categories </label>
                                        <select filterPlaceholder="true" multiple name="Brands_Categories_list[]"
                                            id="Brands_Categories_list_edit"
                                            data-placeholder="Select a Product Categories..."
                                            class="form-control select-search form-control-lg">
                                            @php
                                                $ProductsCategory = \App\Models\ProductsCategory::where('status', 1)->get();
                                            @endphp
                                            @foreach ($ProductsCategory as $ProductCategory)
                                                <option required value="{{ $ProductCategory->id }}">
                                                    {{ $ProductCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Tags </label>
                                        <select filterPlaceholder="true" multiple="multiple" name="Brands_Tag_list[]"
                                            id="Brands_Tag_list_edit" data-placeholder="Select a Product Tags..."
                                            class="form-control select ">
                                            @php
                                                $ProductsTag = \App\Models\ProductsTag::where('status', 1)->get();
                                            @endphp
                                            @foreach ($ProductsTag as $ProductTag)
                                                <option required value="{{ $ProductTag->id }}">
                                                    {{ $ProductTag->tag_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>


                        </div>

                        <div class="row mb-2 mb-mb-0">
                            <div class="col-sm-8 form-group my-auto">
                                <label>Product Thumbnail Image </label>
                                <input type="file" id="product_thumbnail_image_edit" class="form-control imgDmp"
                                    name="product_thumbnail_image">
                            </div>
                            <div class="col-sm-4 mt-2 mt-md-0 mb-3 mb-md-2">
                                <img id="product_thumbnail_edit_image"
                                    style="width:8rem;height:8rem;border:1px solid gray" src=""
                                    alt="Preview">
                            </div>
                        </div>
                        <div class=" row mb-4 mb-mb-0">
                            <div class="col-sm-8 form-group my-auto">
                                <label>Product Thumbnail Image Best Seller</label>
                                <input type="file" id="product_thumbnail_image_best_seller_edit"
                                    class="form-control imgDmp" name="product_thumbnail_image_best_seller">
                            </div>
                            <div class="col-sm-4 mt-2 mt-md-0 mb-3 mb-md-2">
                                <img id="product_thumbnail_image_best_seller_image_edit"
                                    style="width:8rem;height:8rem;border:1px solid gray" src=""
                                    alt="Preview">
                            </div>
                        </div>




                        <div id="product_images_edit">
                            <div id="inputSet_edit1" class="row form-group">
                                <label class="col-md-2 my-auto">Product Image</label>
                                <div class="col-md-6  my-auto">
                                    <input type="file" id="products_image_edit1" class="form-control imgDmp"
                                        name="products_image[]">
                                </div>
                                <div class="col-md-2 mt-2 mt-md-0 mb-3 mb-sm-1 mb-md-2">
                                    <img id="product_thumbnail_image_best_seller_image_edit"
                                        style="width:8rem;height:8rem;border:1px solid gray" src=""
                                        alt="Preview">
                                </div>
                                <div class="col-md-1 my-auto">
                                    <button id="removeImage_edit_1" onclick="removeImage_edit(1);"
                                        class="btn btn-primary mt-1 mt-sm-0"><i class="icon-close2"></i>
                                        Remove</button>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="addNewImage_edit" class="btn btn-primary m-1 "><i
                                class="icon-add"></i> Add Product Images</button>



                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel<i
                                    class="icon-close2 ml-2"></i></button>
                            <button type="submit" class="btn btn-primary">Save Changes<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.imgDmp').change(function() {

            showImg(this);

        });

        function showImg(e) {
            let imgInput = $(e);
            const file = e.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    imgInput.next('input').remove();
                    imgInput.parent().next('div').children('img').attr('src', event.target.result);

                }
                reader.readAsDataURL(file);
            }
        }

        var productImage_Number = 1;
        var productImage_Number_edit = 1;
        var shown = 2;

        $('.delete_product').validate({
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Delete this Product?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#Add_Product_form").validate({
            rules: {
                product_name: {
                    maxlength: 200
                }
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to add this product?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#Manage_stock_list1").css("display", "none");
        $("#Manage_stock_list2").css("display", "block");

        $("#Inventory_Manage_stock").click(function() {
            if (shown == 1) {
                $("#Manage_stock_list1").css("display", "none");
                $("#Manage_stock_list2").css("display", "block");
                shown = 2;
            } else {
                $("#Manage_stock_list2").css("display", "none");
                $("#Manage_stock_list1").css("display", "block");
                shown = 1;
            }
        });


        $('#addNewImage').click(function() {
            var productImage_Number_now = ++productImage_Number
            html = '<div id="inputSet_' + productImage_Number_now +
                '"  class="row m-1"><label class="col-sm-3 text-left my-auto">Product Image</label><input type="file" id="products_image' +
                productImage_Number_now +
                '" class="form-control col-sm-7" name="products_image[]"><button id="removeImage_' +
                productImage_Number_now + '" onclick="removeImage(' + productImage_Number_now +
                ');" class="btn btn-primary  ml-3"><i class="icon-close2"></i> Remove</button></div>';

            $('#product_images').append(html);
        });


        function removeImage_edit(id) {
            $('#inputSet_edit' + id).empty();
            $('#inputSet_edit' + id).css('display', 'none');
        }

        //========= Change Thumbnail image in product Update ==============///



        function editProduct_edit(product) {

            productImage_Number_edit = 1;
            $('#product_id').empty().val(product.id);
            $('#product_name_edit').empty().val(product.name);

            if (product.product_type == 'simple_product') {
                // $('#product_Type_edit option:eq(0)').attr('selected', true);
                // $("#product_Type_edit").select2("val", "simple_product");
                $("#product_Type_edit").val('simple_product').trigger('change');
            } else {
                // $('#product_Type_edit option:eq(1)').attr('selected', true);
                // $("#product_Type_edit").select2("val", "offer_product");
                $("#product_Type_edit").val('offer_product').trigger('change');
            }

            // General Tab
            $('#Regular_price_edit').empty().val(product.g_regular_price);
            $('#Sale_price_edit').empty().val(product.g_sale_price);
            $('#schedule_date_edit').empty().val(product.g_sale_price_date);
            $('#schedule_time_edit').empty().val(product.g_sale_price_time);
            $('#Sale_quantity_edit').empty().val(product.g_sale_quantity);
            $('#Sale_Items_edit').empty().val(product.g_sold_items);
            $('#Sale_status_edit').empty().val(product.g_tax_status);
            $('#Sale_class_edit').empty().val(product.g_tax_class);


            // Inventory Tab 
            $('#Inventory_SKU_edit').empty().val(product.i_sku);
            $('#Inventory_Stock_quantity_edit').empty().val(product.i_stock_quantity);
            // $('#Inventory_Allow_backorders option:eq(' + product.i_backorders + ')').prop('selected', 'selected');

            $("#Inventory_Allow_backorders_edit").val(product.i_backorders).trigger('change');


            $('#Inventory_Low_stock_threshold_edit').empty().val(product.i_low_stock_threshold);



            // $('#Inventory_Stock_status option:eq(' + product.i_stock_status + ')').prop('selected', 'selected');
            $('#Inventory_Stock_status_edit').val(product.i_stock_status).trigger('change');

            $('#Inventory_Sold_individually_edit').removeAttr('checked');
            if (product.i_sold_individually == 1) {

                $('#Inventory_Sold_individually_edit').attr('checked', 'checked');
            }
            $('#Inventory_Max_Quantity_Per_Order_edit').empty().val(product.i_max_quantity_per_order);

            // Tab3
            $('#Shipping_Weight_edit').empty().val(product.s_weight);
            $('#Shipping_Max_Quantity_Per_Order_Length_edit').empty().val(product.s_dimensions_length);
            $('#Shipping_Max_Quantity_Per_Order_Width_edit').empty().val(product.s_dimensions_width);
            $('#Shipping_Max_Quantity_Per_Order_Height_edit').empty().val(product.s_dimensions_heigh);

            // Tab3
            $('#Adv_Purchase_note_edit').empty().val(product.a_purchase_note);


            // Tab 5
            if (product.item_appellation) {
                // $('#Appellations_edit option:eq(' + product.item_appellation + ')').prop('selected', 'selected');
                $("#Appellations_edit").val(product.item_appellation).trigger('change');
            }

            if (product.item_country) {
                // $('#Country_edit option:eq(' + product.item_country + ')').prop('selected', 'selected');
                $("#Country_edit").val(product.item_country).trigger('change');
            }

            if (product.item_producer) {
                // $('#Producer_edit option:eq(' + product.item_producer + ')').prop('selected', 'selected');
                $("#Producer_edit").val(product.item_producer).trigger('change');
            }

            if (product.item_varietals) {
                // $('#Varietals_edit option:eq(' + product.item_varietals + ')').prop('selected', 'selected');
                $("#Varietals_edit").val(product.item_varietals).trigger('change');
            }

            if (product.item_type_category) {
                // $('#Type_Category_edit option:eq(' + product.item_type_category + ')').prop('selected', 'selected');
                $("#Type_Category_edit").val(product.item_type_category).trigger('change');
            }

            if (product.item_format) {
                // $('#Format_edit option:eq(' + product.item_format + ')').prop('selected', 'selected');
                $("#Format_edit").val(product.item_format).trigger('change');
            }

            if (product.item_color) {
                // $('#Colour_edit option:eq(' + product.item_color + ')').prop('selected', 'selected');
                $("#Colour_edit").val(product.item_color).trigger('change');
            }


            if (product.item_environment) {
                // $('#Environment_edit option:eq(' + product.item_environment + ')').prop('selected', 'selected');
                $("#Environment_edit").val(product.item_environment).trigger('change');
            }

            if (product.item_rice_type) {
                // $('#Rice_Type_edit option:eq(' + product.item_rice_type + ')').prop('selected', 'selected');
                $("#Rice_Type_edit").val(product.item_rice_type).trigger('change');
            }

            if (product.item_rice_polishing_rate) {
                // $('#Rice_Polishing_Rate_edit option:eq(' + product.item_rice_polishing_rate + ')').prop('selected',
                //     'selected');
                $("#Rice_Polishing_Rate_edit").val(product.item_rice_polishing_rate).trigger('change');
            }

            // summernote 
            if (product.descriptions) {
                $('#description_product_edit').html(product.descriptions);
                $('#description_product_edit').summernote();
            } else {
                $('#description_product_edit').summernote('reset');
            }

            if (product.awards_accolades_text) {
                $('#awards_product_edit').html(product.awards_accolades_text);
                $('#awards_product_edit').summernote();
            } else {
                $('#awards_product_edit').summernote('reset');
            }


            if (product.testing_nodes_text) {
                $('#testing_product_edit').html(product.testing_nodes_text);
                $('#testing_product_edit').summernote();
            } else {
                $('#testing_product_edit').summernote('reset');
            }

            if (product.additional_info_text) {
                $('#additional_product_edit').html(product.additional_info_text);
                $('#additional_product_edit').summernote();
            } else {
                $('#additional_product_edit').summernote('reset');
            }

            if (product.profile_text) {
                $('#profile_product_edit').html(product.profile_text);
                $('#profile_product_edit').summernote();
            } else {
                $('#profile_product_edit').summernote('reset');
            }
            if (product.serving_sug_text) {
                $('#serving_product_edit').html(product.serving_sug_text);
                $('#serving_product_edit').summernote();
            } else {
                $('#serving_product_edit').summernote('reset');
            }


            var ProductBrandsSelected = [];
            var ProductCategorySelected = [];
            var ProductTagSelected = [];

            product.product_brands.forEach(elem => {
                ProductBrandsSelected.push(parseInt(elem.value));
            });
            $('#Brands_Product_list_edit').select2().val(ProductBrandsSelected).trigger('change');


            product.product_category.forEach(elem => {
                ProductCategorySelected.push(parseInt(elem.value));
            });
            $('#Brands_Categories_list_edit').select2().val(ProductCategorySelected).trigger('change');


            product.products_tag.forEach(elem => {
                ProductTagSelected.push(parseInt(elem.value));
            });
            $('#Brands_Tag_list_edit').select2().val(ProductTagSelected).trigger('change');

            $('#product_thumbnail_edit_image').attr("src", 'storage/' + product.product_thumbnail_image);
            $('#product_thumbnail_image_best_seller_image_edit').attr("src", 'storage/' + product
                .Image_Product_thumbnail_image_best_seller);

            $('#product_images_edit').empty();
            if (product.products_image.length > 0) {

                product.products_image.forEach(elem => {

                    html = '<div id="inputSet_edit' + productImage_Number_edit + '"class="row form-group">' +
                        '<label class="col-sm-2  my-auto">Product Image</label>' +
                        '<div class="col-md-6  my-auto">' +
                        '<input type="file" id="products_image_edit' +
                        productImage_Number_edit +
                        '"class="form-control imgDmp" onchange="showImg(this)" name="products_image[]">' +
                        '<input type="hidden" name="saved_product_img_id[]" value="' + elem.id + '">' +
                        '</div>' +
                        '<div class="col-md-2 mt-2 mt-md-0 mb-3 mb-sm-1 mb-md-2">' +
                        '<img id="product_thumbnail_image_best_seller_image_edit' + productImage_Number_edit + '"' +
                        'style = "width:8rem;height:8rem;border:1px solid gray" src = "storage/' + elem.img + '"' +
                        'alt = "Preview" >' +
                        '</div>' +
                        '<div class="col-md-1 my-auto">' +
                        '<button id = "removeImage_edit_' +
                        productImage_Number_edit + '" onclick="removeImage_edit(' + productImage_Number_edit +
                        ');" class="btn btn-primary"><i class="icon-close2"></i> Remove</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    productImage_Number_edit = ++productImage_Number_edit
                    $('#product_images_edit').append(html);

                });
            } else {

            }






            // $.ajax({
            //     url: '/ModuleMarketing/product/detailsList',
            //     data: {
            //         id: product.id,
            //         _token: '{{ csrf_token() }}'
            //     },
            //     type: "POST",
            //     error: function() {

            //     },
            //     success: function(data) {
            //         for (var i = 0; i < data.ProductCategory.length; i++) {

            //             ProductCategorySelected.push(data.ProductCategory[i].value);

            //         }
            //         for (var i = 0; i < data.ProductBrands.length; i++) {
            //             ProductBrandsSelected.push(data.ProductBrands[i].value);
            //         }
            //         for (var i = 0; i < data.ProductTag.length; i++) {
            //             ProductTagSelected.push(data.ProductTag[i].value);
            //         }
            //     }
            // });



            //         $("#product_Type_edit > option").prop("selected", function(){
            //     return $.trim(this.value) == product.product_type;
            //   });

            // $('#description_product_edit').empty().val();



            $('#modal_large_editProduct').modal({
                backdrop: 'static',
                keyboard: false,
                show: true,
            });
        }


        $('#addNewImage_edit').click(function() {

            html = '<div id="inputSet_edit' + productImage_Number_edit + '"class="row form-group">' +
                '<label class="col-sm-2  my-auto">Product Image</label>' +
                '<div class="col-md-6  my-auto">' +
                '<input type="file" id="products_image_edit' +
                productImage_Number_edit +
                '"class="form-control imgDmp" onchange="showImg(this)" name="products_image[]">' +
                '</div>' +
                '<div class="col-md-2 mt-2 mt-md-0 mb-3 mb-sm-1 mb-md-2">' +
                '<img id="product_thumbnail_image_best_seller_image_edit' + productImage_Number_edit + '"' +
                'style = "width:8rem;height:8rem;border:1px solid gray" src = ""' +
                'alt = "Preview" >' +
                '</div>' +
                '<div class="col-md-1 my-auto">' +
                '<button id = "removeImage_edit_' +
                productImage_Number_edit + '" onclick="removeImage_edit(' + productImage_Number_edit +
                ');" class="btn btn-primary"><i class="icon-close2"></i> Remove</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            productImage_Number_edit = ++productImage_Number_edit
            $('#product_images_edit').append(html);

        });







        $('#schedule_section').toggle();
        $('.schedule').click(function() {
            $('#schedule_section').toggle();
        });

        $('#schedule_section_edit').toggle();
        $('.schedule_edit').click(function() {
            $('#schedule_section_edit').toggle();
        });


        function removeImage(id) {
            $('#inputSet_' + id).empty();
        }


        $('.PageLocation').empty().append('Products');
        // Basic initialization
        $('.datatable-basic').DataTable({
            autoWidth: false,
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
        $("#Add_Brands_form_edit").validate({
            rules: {
                brands_name_edit: {
                    maxlength: 200
                },
                brands_image_edit: {
                    accept: "jpg,png,jpeg"
                },
                Brands_banner_image_edit: {
                    accept: "jpg,png,jpeg"
                }
            },
            messages: {
                brands_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                },
                Brands_banner_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                }

            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Edit this brands?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $(".delete_barnds").validate({
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Delete this brands?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });





        $("#Add_Category_form_edit").validate({
            rules: {
                Category_name_edit: {
                    maxlength: 200
                },
                Category_image_edit: {
                    accept: "jpg,png,jpeg"
                },
                Category_banner_image_edit: {
                    accept: "jpg,png,jpeg"
                }
            },
            messages: {
                Category_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                },
                Category_banner_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                }

            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to edit this Category?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $(".delete_Category").validate({
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Delete this Category?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });


        $("#Add_Category_form").validate({
            rules: {
                Category_name: {
                    maxlength: 200
                },
                Category_image: {
                    accept: "jpg,png,jpeg"
                },
                Category_banner_image: {
                    accept: "jpg,png,jpeg"
                }
            },
            messages: {
                Category_image: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                },
                Category_banner_image: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                }

            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to create this Category?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#Add_Category_form_edit").validate({
            rules: {
                Category_name_edit: {
                    maxlength: 200
                },
                Category_image_edit: {
                    accept: "jpg,png,jpeg"
                },
                Category_banner_image_edit: {
                    accept: "jpg,png,jpeg"
                }
            },
            messages: {
                Category_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                },
                Category_banner_image_edit: {
                    accept: "Only image type jpg/png/jpeg/gif is allowed"
                }

            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to edit this Category?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#Add_Tag_form").validate({
            rules: {
                tag_name: {
                    maxlength: 200
                },
                tag: {
                    maxlength: 200
                },
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to create this tag?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#edit_Tag_form").validate({
            rules: {
                tag_name_edit: {
                    maxlength: 200
                },
                tag_edit: {
                    maxlength: 200
                },
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to edit this tag?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $(".delete_Tag").validate({
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Delete this Tag?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#add_attributes_form").validate({
            rules: {
                attributes_name: {
                    maxlength: 200
                },
                atributes: {
                    maxlength: 200
                },
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to create this attributes?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $("#edit_attributes_form").validate({
            rules: {
                attributes_name_edit: {
                    maxlength: 200
                },
                atributes_edit: {
                    maxlength: 200
                },
            },
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to edit this attributes?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });

        $(".delete_Attributes").validate({
            submitHandler: function(form) {
                $.alert({
                    title: 'Are you sure!',
                    content: 'Do you really want to Delete this Tag?',
                    buttons: {
                        confirm: function() {
                            form.submit();
                        },
                        cancel: function() {

                        }
                    }
                });
            }
        });


        function deleteBrand(id) {
            $.ajax({
                url: '/ModuleProducts/Brands/delete',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                type: "POST",
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                    alert('Bannner Deleted');
                    location.reload();
                }
            });
        }
    </script>

    <script>
        //redirect to specific tab

        $(document).ready(function() {
            $('.summernote').summernote();
            var valueTab = '{{ old('tab') }}';
            if (valueTab) {
                $('#colored-rounded-tab1').removeClass('active show');
                $('#tab1').removeClass('active');
                $('#{{ old('tab') }}').addClass('active show');
                $('#{{ old('tabtitle') }}').addClass('active');
            }

        });

        function editBrands(id, name) {
            $('#id_edit_brands').empty().val(id);
            $('#brands_name_edit').empty().val(name);
            $('#modal_large_editBrands').modal('show');
        }

        function editCategory(id, name) {
            $('#id_edit_Category').empty().val(id);
            $('#Category_name_edit').empty().val(name);
            $('#modal_large_editCategory').modal('show');
        }

        function editTag(id, nameTag, Tag) {
            $('#id_edit_tag').empty().val(id);
            $('#tag_name_edit').empty().val(nameTag);
            $('#tag_edit').empty().val(Tag);
            $('#modal_large_editTag').modal('show');
        }

        function editAttributes(id, cat, type, attr) {
            $('#id_edit_attributes').empty().val(id);
            $('#attributes_cat_name_edit option[value=' + cat + ']').attr('selected', 'selected');
            $('#attributes_Type_edit option[value=' + type + ']').attr('selected', 'selected');
            $('#atributes_edit').empty().val(attr);
            $('#modal_large_editAttributes').modal('show');
        }

        function submitNewBestSale() {
            var id = $('#best_sale_items').val();
            $.ajax({
                url: '/ModuleProducts/product/bestsale',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                type: "POST",
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                    alert('Product Added Successfully');
                    location.reload();
                }
            });
        }

        function removeBestSale(id) {
            $.ajax({
                url: '/ModuleProducts/product/bestsale/remove',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                type: "POST",
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                    alert('Product Removed Successfully');
                    location.reload();
                }
            });
        }
    </script>
    <style>
        .PageLocation {
            display: contents;
        }
    </style>
@endsection
