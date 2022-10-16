<div class="row">
    <div id="Appellation_Filters" class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
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
                    $var = str_replace(' ', '_', $var);
                    $var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Appellation_Filters" id="AppellationPicker_{{ $var }}"
                    onclick="AppellationPicker({{ $AppellationsFiltersitem->id }},'AppellationPicker_{{ $var }}')">
                    <h2>{{ $AppellationsFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col"></div>
</div>


<div class="row">
    <div id="Producer_Filters" class="col-md-12 col-lg-12 portfolio-shop-product-side-menu ">
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
    <div id="Varietals_Filters" class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Varietals</h1>
        <ul>
            @php
                $VarietalsFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Varietals')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($VarietalsFilters as $VarietalsFiltersitem)
                @php
                    $var = str_replace('/', '_', $VarietalsFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Varietals_Filters" id="VarietalsPicker_{{ $var }}"
                    onclick="VarietalsPicker({{ $VarietalsFiltersitem->id }},'VarietalsPicker_{{ $var }}')">
                    <h2>{{ $VarietalsFiltersitem->atributes_ }}</h2>
                </li>
            @endforeach
        </ul>
    </div>
</div>


<div class="row">
    <div id="Format_Filters" class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
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

<div class="row" style="width: 470px" >
    <div id="Colour_Filters" class="col-md-6 col-lg-4 portfolio-shop-product-side-menu-color">
        <h1>Colour</h1>
        @php
            $ColourFilters = \App\Models\ProductsAttributes::where('status', 1)
                ->where('attributes_Type', 'Colour')
                ->where('attributes_cat_name', $category)
                ->get();
        @endphp
        @foreach ($ColourFilters as $ColourFiltersitem)
            @php
                $var = str_replace('/', '_', $ColourFiltersitem->atributes_);
                $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                switch ($var) {
                    case 'Lemon_Green':
                        $color_code = 'greenyellow';
                        break;
                    case 'Red':
                        $color_code = 'red';
                        break;
                    case 'Rose':
                        $color_code = 'mediumvioletred';
                        break;
                    default:
                        $color_code = 'back';
                        break;
                }

                
            @endphp
            <li class="pointer Colour_Filters" id="ColorPicker_{{ $var }}"
                onclick="ColorPicker({{ $ColourFiltersitem->id }},'ColorPicker_{{ $var }}')">
                <svg width="10" height="10">
                    <rect width="10" height="10" style="fill:{{ $color_code }};" />
                </svg> {{$ColourFiltersitem->atributes_}}
            </li>
        @endforeach
    </div>
</div>


<div id="Environment_Filters" class="row">
    <div class="col-md-12 col-lg-12 portfolio-shop-product-side-menu">
        <h1>Environment</h1>
        <ul>
            @php
                $EnvironmentFilters = \App\Models\ProductsAttributes::where('status', 1)
                    ->where('attributes_Type', 'Environment')
                    ->where('attributes_cat_name', $category)
                    ->get();
            @endphp
            @foreach ($EnvironmentFilters as $EnvironmentFiltersitem)
                @php
                    $var = str_replace('/', '_', $EnvironmentFiltersitem->atributes_);
                    $var = str_replace(' ', '_', $var);$var = str_replace('&', '', $var);$var = str_replace('(', '', $var);$var = str_replace(')', '', $var);$var = str_replace('.', '', $var);$var = str_replace(',', '', $var);
                @endphp
                <li class="pointer Environment_Filters" id="EnvironmentPicker_{{ $var }}"
                    onclick="EnvironmentPicker({{ $EnvironmentFiltersitem->id }},'EnvironmentPicker_{{ $var }}')">
                    <h2>{{ $EnvironmentFiltersitem->atributes_ }}</h2>
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
    <div class="col"></div>
</div>
