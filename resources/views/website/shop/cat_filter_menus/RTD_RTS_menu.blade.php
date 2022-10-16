<div class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Country</h1>
        <ul>
            @php
                $CountryFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Country')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($CountryFilters as $CountryFiltersitem)
                @php
                    $var = str_replace('/', '_', $CountryFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Country_Filters" id="CountryPicker_{{ $var }}"
                    onclick="CountryPicker({{ $CountryFiltersitem->id }},'CountryPicker_{{ $var }}')">
                    <h2>{{ $CountryFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col"></div>
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
    <div class="col"></div>
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
    <div class="col"></div>
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
    <div class="col"></div>
</div>

<div class="row filter-product-row" style="">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu-tags">
        <h1>Product Tags</h1>
        @foreach ($productTagList as $productTagListitem)
            <button type="button"
                class="product-tag">{{ $productTagListitem->tag_name }}</button>

        @endforeach

    </div>
    <div class="col"></div>
</div>
