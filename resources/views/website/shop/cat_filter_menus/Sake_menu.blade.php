<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Appellation</h1>
        <ul>
            @php
                $AppellationsFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Appellations')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($AppellationsFilters as $AppellationsFiltersitem)
                @php
                    $var = str_replace('/', '_', $AppellationsFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Appellation_Filters" id="AppellationPicker_{{ $var }}"
                    onclick="AppellationPicker({{ $AppellationsFiltersitem->id }},'AppellationPicker_{{ $var }}')">
                    <h2>{{ $AppellationsFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Producer</h1>
        <ul>
            @php
                $ProducerFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Producer')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($ProducerFilters as $ProducerFiltersitem)
                @php
                    $var = str_replace('/', '_', $ProducerFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Producer_Filters" id="ProducerPicker_{{ $var }}"
                    onclick="ProducerPicker({{ $ProducerFiltersitem->id }},'ProducerPicker_{{ $var }}')">
                    <h2>{{ $ProducerFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>

<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Type/Category</h1>
        <ul>
            @php
                $Type_CategoryFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Type_Category')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($Type_CategoryFilters as $Type_CategoryFiltersitem)
                @php
                    $var = str_replace('/', '_', $Type_CategoryFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Type_Category_Filters" id="Type_Category_{{ $var }}"
                    onclick="Type_Category({{ $Type_CategoryFiltersitem->id }},'Type_Category_{{ $var }}')">
                    <h2>{{ $Type_CategoryFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Format</h1>
        <ul>
            @php
                $FormatFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Format')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($FormatFilters as $FormatFiltersitem)
                @php
                    $var = str_replace('/', '_', $FormatFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Format_Filters" id="FormatPicker_{{ $var }}"
                    onclick="FormatPicker({{ $FormatFiltersitem->id }},'FormatPicker_{{ $var }}')">
                    <h2>{{ $FormatFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Rice Type</h1>
        <ul>
            @php
                $Rice_TypeFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Rice_Type')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($Rice_TypeFilters as $Rice_TypeFiltersitem)
                @php
                    $var = str_replace('/', '_', $Rice_TypeFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Rice_Type" id="Rice_TypePicker_{{ $var }}"
                    onclick="Rice_TypePicker({{ $Rice_TypeFiltersitem->id }},'Rice_TypePicker_{{ $var }}')">
                    <h2>{{ $Rice_TypeFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>


<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Rice Polishing Rate </h1>
        <ul>
            @php
                $Rice_Polishing_Rate_Filters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Rice_Polishing_Rate')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($Rice_Polishing_Rate_Filters as $Rice_Polishing_Rate_Filtersitem)
                @php
                    $var = str_replace('/', '_', $Rice_Polishing_Rate_Filtersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Rice_Polishing_Rate" id="Rice_Polishing_RatePicker_{{ $var }}"
                    onclick="Rice_Polishing_RatePicker({{ $Rice_Polishing_Rate_Filtersitem->id }},'Rice_Polishing_RatePicker_{{ $var }}')">
                    <h2>{{ $Rice_Polishing_Rate_Filtersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>

</div>

<div class="row filter-product-row" style="">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu-tags">
        <h1>Product Tags</h1>
        @foreach ($productTagList as $productTagListitem)
            <button type="button"
                class="product-tag">{{ $productTagListitem->tag_name }}</button>

        @endforeach

    </div>

</div>
