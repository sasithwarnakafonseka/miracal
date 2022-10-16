<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use App\Models\Sale;
use App\Models\Products;
use App\Models\ProductsBrands;
use App\Models\ProductsCategory;
use App\Models\ProductsTag;
use App\Models\ProductsAttributes;


use App\Models\ProductBrands;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\ProductAttributes;
use App\Models\ProductImage;

class ModuleProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:products');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Products = Products::with('productBrands', 'productCategory', 'productsTag', 'productsImage')->get();
        $ProductsBestSales = Products::where('best_sellers', 1)->get();
        $ProductsBestSalesNot = Products::where('best_sellers', 0)->get();
        $Brands = ProductsBrands::get();
        $Category = ProductsCategory::get();
        $Tag = ProductsTag::get();
        $Attributes = ProductsAttributes::get();
        return view('moduleProducts.index', ['ProductsBestSalesNot' => $ProductsBestSalesNot, 'ProductsBestSales' => $ProductsBestSales, 'ProductsList' => $Products, 'BrandsList' => $Brands, 'CategoryList' => $Category, 'Tag' => $Tag, 'Attributes' => $Attributes, 'tab' => null]);
    }

    //add product start
    public function addProduct(Request $Request)
    {

        $Products = new Products();
        $Products->name = $Request->product_name;
        $Products->descriptions = $Request->description_product;
        $Products->product_type = $Request->product_Type;

        $Products->g_regular_price = $Request->Regular_price;
        $Products->g_sale_price = $Request->Sale_price;
        $Products->g_sale_price_date = $Request->schedule_date;
        $Products->g_sale_price_time = $Request->schedule_time;
        $Products->g_sale_quantity = $Request->Sale_quantity;
        $Products->g_sold_items = $Request->Sale_Items;
        $Products->g_tax_status = $Request->Sale_status;
        $Products->g_tax_class = $Request->Sale_class;

        $Products->i_sku = $Request->Inventory_SKU;
        // dd($Request->Inventory_Stock_quantity);
        if ($Request->Inventory_Stock_quantity != null) {
            $Products->i_stock_quantity = $Request->Inventory_Stock_quantity;
        } else {
            $Products->i_stock_quantity = $Request->Sale_Items + $Request->Sale_quantity;
        }

        $Products->i_backorders = $Request->Inventory_Allow_backorders;
        $Products->i_low_stock_threshold = $Request->Inventory_Low_stock_threshold;
        $Products->i_stock_status = $Request->Inventory_Stock_status;
        $Products->i_sold_individually = $Request->Inventory_Sold_individually;
        $Products->i_max_quantity_per_order = $Request->Inventory_Max_Quantity_Per_Order;


        $Products->profile_text = $Request->profile_text;
        $Products->awards_accolades_text = $Request->awards_accolades_text;
        $Products->testing_nodes_text = $Request->testing_nodes_text;
        $Products->additional_info_text = $Request->additional_info_text;
        $Products->serving_sug_text = $Request->serving_sug_text;


        $Products->s_weight = $Request->Shipping_Weight;
        $Products->s_dimensions_length = $Request->Shipping_Max_Quantity_Per_Order_Length;
        $Products->s_dimensions_width = $Request->Shipping_Max_Quantity_Per_Order_Width;
        $Products->s_dimensions_heigh = $Request->Shipping_Max_Quantity_Per_Order_Height;

        $Products->a_purchase_note = $Request->Adv_Purchase_note;

        $Products->item_appellation = $Request->Appellations;
        $Products->item_country = $Request->Country;
        $Products->item_producer = $Request->Producer;
        $Products->item_varietals = $Request->Varietals;
        $Products->item_type_category = $Request->Type_Category;
        $Products->item_format = $Request->Format;
        $Products->item_color = $Request->Colour;
        $Products->item_environment = $Request->Environment;
        $Products->item_rice_type = $Request->Rice_Type;
        $Products->item_rice_polishing_rate = $Request->Rice_Polishing_Rate;



        if ($Image_Product_thumbnail_image = $Request->product_thumbnail_image) {
            $products_image_path = Storage::putFile('Products/thumbnail_image', $Image_Product_thumbnail_image, 'public');
            $Products->product_thumbnail_image = $products_image_path;
        }

        if ($Image_Product_thumbnail_image_best_seller = $Request->product_thumbnail_image_best_seller) {
            $products_image_path_best = Storage::putFile('Products/thumbnail_image_best_seller', $Image_Product_thumbnail_image_best_seller, 'public');
            $Products->Image_Product_thumbnail_image_best_seller = $products_image_path_best;
        }


        $Products->save();

        // if($Request->Brands_Attributes_list){
        //     foreach($Request->Brands_Attributes_list as $Brands_Attributes){
        //         $product_attributes = new ProductAttributes();
        //         $product_attributes->product_id = $Products->id;
        //         $product_attributes->value = $Brands_Attributes;
        //         $product_attributes->save();
        //     }
        // }

        if ($Request->Brands_Product_list) {
            foreach ($Request->Brands_Product_list as $Brands_Product) {
                $product_brands = new ProductBrands();
                $product_brands->product_id = $Products->id;
                $product_brands->value = $Brands_Product;
                $product_brands->save();
            }
        }

        if ($Request->Brands_Categories_list) {
            foreach ($Request->Brands_Categories_list as $Brands_Categories) {
                $product_categories = new ProductCategory();
                $product_categories->product_id = $Products->id;
                $product_categories->value = $Brands_Categories;
                $product_categories->save();
            }
        }

        if ($Request->Brands_Tag_list) {
            foreach ($Request->Brands_Tag_list as $Brands_Tag) {
                $product_tags = new ProductTag();
                $product_tags->product_id = $Products->id;
                $product_tags->value = $Brands_Tag;
                $product_tags->save();
            }
        }

        if ($Request->products_image) {
            foreach ($Request->products_image as $products_image) {
                $product_images = new ProductImage();
                $product_images->product_id = $Products->id;
                $product_image_path = Storage::putFile('Products/Product_Images', $products_image, 'public');
                $product_images->img = $product_image_path;
                $product_images->save();
            }
        }

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab2', 'tabtitle' => 'tab2']);
    }
    //add product end


    //delete product start

    public function deleteProduct(Request $Request)
    {
        Products::find($Request->pr_delete_id)->delete();

        ProductAttributes::select('product_id', $Request->pr_delete_id)->delete();
        ProductBrands::select('product_id', $Request->pr_delete_id)->delete();
        ProductCategory::select('product_id', $Request->pr_delete_id)->delete();
        ProductTag::select('product_id', $Request->pr_delete_id)->delete();
        ProductImage::select('product_id', $Request->pr_delete_id)->delete();

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab1', 'tabtitle' => 'tab1']);
    }
    //delete product end

    //edit product start
    public function editProduct(Request $Request)
    {

        $Products = Products::find($Request->product_id);

        $Products->name = $Request->product_name;
        $Products->product_type = $Request->product_Type;

        // General Tab
        $Products->g_regular_price = $Request->Regular_price;
        $Products->g_sale_price = $Request->Sale_price;
        $Products->g_sale_price_date = $Request->schedule_date;
        $Products->g_sale_price_time = $Request->schedule_time;
        $Products->g_sale_quantity = $Request->Sale_quantity;
        $Products->g_sold_items = $Request->Sale_Items;
        $Products->g_tax_status = $Request->Sale_status;
        $Products->g_tax_class = $Request->Sale_class;


        // Inventory Tab 
        $Products->i_sku = $Request->Inventory_SKU;

        $Products->i_stock_quantity = $Request->Inventory_Stock_quantity;

        $Products->i_backorders = $Request->Inventory_Allow_backorders;
        $Products->i_low_stock_threshold = $Request->Inventory_Low_stock_threshold;
        $Products->i_stock_status = $Request->Inventory_Stock_status;
        if ($Request->Inventory_Sold_individually == 'on') {
            $Products->i_sold_individually = 1;
        } else {
            $Products->i_sold_individually = 0;
        }

        $Products->i_max_quantity_per_order = $Request->Inventory_Max_Quantity_Per_Order;

        // Tab3
        $Products->s_weight = $Request->Shipping_Weight;
        $Products->s_dimensions_length = $Request->Shipping_Max_Quantity_Per_Order_Length;
        $Products->s_dimensions_width = $Request->Shipping_Max_Quantity_Per_Order_Width;
        $Products->s_dimensions_heigh = $Request->Shipping_Max_Quantity_Per_Order_Height;



        $Products->profile_text = $Request->profile_text;
        $Products->awards_accolades_text = $Request->awards_accolades_text;
        $Products->testing_nodes_text = $Request->testing_nodes_text;
        $Products->additional_info_text = $Request->additional_info_text;
        $Products->serving_sug_text = $Request->serving_sug_text;

        // Tab 4
        $Products->a_purchase_note = $Request->Adv_Purchase_note;

        // Tab 5
        $Products->item_appellation = $Request->Appellations;
        $Products->item_country = $Request->Country;
        $Products->item_producer = $Request->Producer;
        $Products->item_varietals = $Request->Varietals;
        $Products->item_type_category = $Request->Type_Category;
        $Products->item_format = $Request->Format;
        $Products->item_color = $Request->Colour;
        $Products->item_environment = $Request->Environment;
        $Products->item_rice_type = $Request->Rice_Type;
        $Products->item_rice_polishing_rate = $Request->Rice_Polishing_Rate;


        // $Products->profile_text = $Request->profile_text;
        // $Products->awards_accolades_text = $Request->awards_accolades_text;
        // $Products->testing_nodes_text = $Request->testing_nodes_text;
        // $Products->additional_info_text = $Request->additional_info_text;
        // $Products->serving_sug_text = $Request->serving_sug_text;
        // summernote
        $Products->descriptions = $Request->description_product;
        $Products->profile_text = $Request->profile_product;
        $Products->awards_accolades_text = $Request->awards_product;
        $Products->testing_nodes_text = $Request->testing_product;
        $Products->additional_info_text = $Request->additional_product;
        $Products->serving_sug_text = $Request->serving_product;

        if ($Image_Product_thumbnail_image = $Request->product_thumbnail_image) {
            $products_image_path = Storage::putFile('Products/thumbnail_image', $Image_Product_thumbnail_image, 'public');
            $Products->product_thumbnail_image = $products_image_path;
        }

        if ($Image_Product_thumbnail_image_best_seller = $Request->product_thumbnail_image_best_seller) {
            $products_image_path_best = Storage::putFile('Products/thumbnail_image_best_seller', $Image_Product_thumbnail_image_best_seller, 'public');
            $Products->Image_Product_thumbnail_image_best_seller = $products_image_path_best;
        }


        $Products->save();


        if ($Request->Brands_Product_list) {
            ProductBrands::where('product_id', $Request->product_id)->delete();
            foreach ($Request->Brands_Product_list as $Brands_Product) {
                $product_brands = new ProductBrands();
                $product_brands->product_id = $Request->product_id;
                $product_brands->value = $Brands_Product;
                $product_brands->save();
            }
        }

        if ($Request->Brands_Categories_list) {
            ProductCategory::where('product_id', $Request->product_id)->delete();
            foreach ($Request->Brands_Categories_list as $Brands_Categories) {
                $product_categories = new ProductCategory();
                $product_categories->product_id = $Request->product_id;
                $product_categories->value = $Brands_Categories;
                $product_categories->save();
            }
        }

        if ($Request->Brands_Tag_list) {
            ProductTag::where('product_id', $Request->product_id)->delete();
            foreach ($Request->Brands_Tag_list as $Brands_Tag) {
                $product_tags = new ProductTag();
                $product_tags->product_id = $Request->product_id;
                $product_tags->value = $Brands_Tag;
                $product_tags->save();
            }
        }

        $save_product_image = false;

        if ($Request->products_image && $Request->saved_product_img_id) {
            ProductImage::whereNotIn('id', $Request->saved_product_img_id)->where('product_id', $Request->product_id)->delete();
            $save_product_image = true;
        } else if($Request->saved_product_img_id){
            ProductImage::whereNotIn('id', $Request->saved_product_img_id)->where('product_id', $Request->product_id)->delete();
            $save_product_image = false;
        }else if($Request->products_image){
            $save_product_image = true;
            ProductImage::where('product_id', $Request->product_id)->delete();
        }

        if($save_product_image){
            foreach ($Request->products_image as $products_image) {
                $product_images = new ProductImage();
                $product_images->product_id = $Request->product_id;
                $product_image_path = Storage::putFile('Products/Product_Images', $products_image, 'public');
                $product_images->img = $product_image_path;
                $product_images->save();
            }
        }
        

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab1', 'tabtitle' => 'tab1']);
    }
    //edit product end

    //Brands Start
    public function addBrands(Request $Request)
    {
        $ProductsBrand = new ProductsBrands();
        $ProductsBrand->name = $Request->brands_name;
        $ProductsBrand->status = 1;
        if ($Image_Product = $Request->file('brands_image')) {
            $products_image_path = Storage::putFile('Products/Brand', $Image_Product, 'public');
            $ProductsBrand->img = $products_image_path;
        }

        if ($Image_Product_Banner = $Request->file('Brands_banner_image')) {
            $products_image_path_banner = Storage::putFile('Products/BrandBanner', $Image_Product_Banner, 'public');
            $ProductsBrand->img_banner = $products_image_path_banner;
        }

        $ProductsBrand->save();


        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab3', 'tabtitle' => 'tab3']);
    }

    public function editBrands(Request $Request)
    {
        $ProductsBrand = ProductsBrands::find($Request->id_edit_brands);
        $ProductsBrand->name = $Request->brands_name_edit;
        $ProductsBrand->status = 1;
        if ($Image_Product = $Request->file('brands_image_edit')) {
            $products_image_path = Storage::putFile('Products/Brand', $Image_Product, 'public');
            $ProductsBrand->img = $products_image_path;
        }

        if ($Image_Product_Banner = $Request->file('Brands_banner_image_edit')) {
            $products_image_path_banner = Storage::putFile('Products/BrandBanner', $Image_Product_Banner, 'public');
            $ProductsBrand->img_banner = $products_image_path_banner;
        }

        $ProductsBrand->update();


        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab3', 'tabtitle' => 'tab3']);
    }

    public function deleteBrands(Request $Request)
    {
        // dd($Request->id);
        ProductsBrands::find($Request->id)->delete();
        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab3', 'tabtitle' => 'tab3']);
    }
    //Brands End

    //Attributes Start
    public function addAttributes(Request $Request)
    {

        $ProductsAttributes = new ProductsAttributes();
        $ProductsAttributes->attributes_cat_name = $Request->attributes_cat_name;

        $Category = ProductsCategory::where('id', $Request->attributes_cat_name)->first();

        $ProductsAttributes->cat_name = $Category->name;
        $ProductsAttributes->attributes_Type = $Request->attributes_Type;
        $ProductsAttributes->atributes_ = $Request->atributes_;
        $ProductsAttributes->status = 1;
        $ProductsAttributes->save();

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab6', 'tabtitle' => 'tab6']);
    }

    public function deleteAttributes(Request $Request)
    {
        ProductsAttributes::find($Request->Attributes_delete_id)->delete();
        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab6', 'tabtitle' => 'tab6']);
    }

    public function editAttributes(Request $Request)
    {
        $ProductsAttributes =  ProductsAttributes::find($Request->id_edit_attributes);
        $ProductsAttributes->attributes_cat_name = $Request->attributes_cat_name_edit;
        $ProductsAttributes->attributes_Type = $Request->attributes_Type_edit;
        $ProductsAttributes->atributes_ = $Request->atributes_edit;
        $ProductsAttributes->status = 1;
        $ProductsAttributes->update();

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab6', 'tabtitle' => 'tab6']);
    }
    //Attributes End

    //Category Start
    public function addCategory(Request $Request)
    {
        $ProductsCategory = new ProductsCategory();
        $ProductsCategory->name = $Request->Category_name;
        $ProductsCategory->status = 1;
        if ($Parent = $Request->Parent_Category_id) {
            $ProductsCategory->parent = $Parent;
        }

        $ProductsCategory->status = 1;
        if ($Image_Product = $Request->file('Category_image')) {
            $products_image_path = Storage::putFile('Products/Category', $Image_Product, 'public');
            $ProductsCategory->img = $products_image_path;
        }

        if ($Image_Product_Banner = $Request->file('Category_Banner_image')) {
            $products_image_path_banner = Storage::putFile('Products/CategoryBanner', $Image_Product_Banner, 'public');
            $ProductsCategory->img_banner = $products_image_path_banner;
        }

        $ProductsCategory->save();


        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab4', 'tabtitle' => 'tab4']);
    }

    public function deleteCategory(Request $Request)
    {
        ProductsCategory::find($Request->cat_delete_id)->delete();
        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab4', 'tabtitle' => 'tab4']);
    }


    function detailsList(Request $Request)
    {
        $ProductBrands = ProductBrands::where('product_id', $Request->id)->get();
        $ProductCategory = ProductCategory::where('product_id', $Request->id)->get();
        $ProductTag = ProductTag::where('product_id', $Request->id)->get();

        return ['ProductTag' => $ProductTag, 'ProductCategory' => $ProductCategory, 'ProductBrands' => $ProductBrands];
    }

    public function editCategory(Request $Request)
    {
        $ProductsCategory = ProductsCategory::find($Request->id_edit_Category);
        $ProductsCategory->name = $Request->Category_name_edit;
        $ProductsCategory->status = 1;
        if ($Parent = $Request->Parent_Category_id_edit) {
            $ProductsCategory->parent = $Parent;
        } else {
            $ProductsCategory->parent = null;
        }

        $ProductsCategory->status = 1;
        if ($Image_Product = $Request->file('Category_image_edit')) {
            $products_image_path = Storage::putFile('Products/Category', $Image_Product, 'public');
            $ProductsCategory->img = $products_image_path;
        }

        if ($Image_Product_Banner = $Request->file('Category_Banner_image_edit')) {
            $products_image_path_banner = Storage::putFile('Products/CategoryBanner', $Image_Product_Banner, 'public');
            $ProductsCategory->img_banner = $products_image_path_banner;
        }

        $ProductsCategory->update();


        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab4', 'tabtitle' => 'tab4']);
    }
    //Category End

    //Tag Start
    public function addTag(Request $Request)
    {
        $ProductsTag = new ProductsTag();
        $ProductsTag->tag_name = $Request->tag_name;
        $ProductsTag->tag = $Request->tag;
        $ProductsTag->status = 1;
        $ProductsTag->save();

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab5', 'tabtitle' => 'tab5']);
    }
    public function deleteTag(Request $Request)
    {
        ProductsTag::find($Request->tag_delete_id)->delete();
        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab5', 'tabtitle' => 'tab5']);
    }

    public function editTag(Request $Request)
    {
        $ProductsTag = ProductsTag::find($Request->id_edit_tag);
        $ProductsTag->tag_name = $Request->tag_name_edit;
        $ProductsTag->tag = $Request->tag_edit;
        $ProductsTag->status = 1;
        $ProductsTag->update();

        toastr()->success('Your Action Success');
        return back()->withInput(['tab' => 'colored-rounded-tab5', 'tabtitle' => 'tab5']);
    }
    //Tag End


    // excel import start
    public function import()
    {
        Excel::import(new ProductsImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
    // excel import end


    public function bestsale(Request $Request)
    {
        $product = Products::find($Request->id);
        $product->best_sellers = 1;
        $product->update();

        return 'successfully';
    }

    public function bestsale_remove(Request $Request)
    {
        $product = Products::find($Request->id);
        $product->best_sellers = 0;
        $product->update();

        return 'successfully';
    }


    public function getproductbyid(Request $Request)
    {
        $product = Products::find($Request->id);
        return $product;
    }

    public function getordersbyuser(Request $Request)
    {
        $sales = Sale::with('saleproduct', 'salebill')->where('customer_id', $Request->id)->get();
        return $sales;
    }
}
