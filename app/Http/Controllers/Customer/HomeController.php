<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SendMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use App\Models\Partners;
use App\Models\ProductImage;
use App\Models\ProductsCategory;
use App\Models\ProductsTag;
use App\Models\Team;
use App\Models\Banner;
use App\Models\Products;
use App\Models\ProductsAttributes;
use App\Models\Testimonios;
use App\Models\User;
use App\Models\EventRegister;
use App\Models\Rate;
use App\Models\Sale;
use Cookie;
use Illuminate\Support\Facades\Hash;

use DB;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('SystemStatusWebPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $MainBanners = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 7)->where('loaction_type', 1)->inRandomOrder()->limit(5)->get();
        $OfferBanners = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 7)->where('loaction_type', 2)->inRandomOrder()->limit(5)->get();
        $partners = Partners::inRandomOrder()->get();
        $News_Events = Post::where('type', 2)->orderBy('updated_at', 'desc')->limit(3)->get();
        $Blog = Post::where('type', 1)->orderBy('updated_at', 'desc')->limit(3)->get();
        $bestSell = Products::where('best_sellers', 1)->limit(10)->get();
        $latestProducts = Products::latest()->take(5)->get();

        $PRESENTS = array(
            'SKINCARE' => Products::where('best_sellers', 1)->limit(10)->get(),
            'HAIRCARE' => Products::where('best_sellers', 1)->limit(10)->get(),
            'PHARMACEUTICAL' => Products::where('best_sellers', 1)->limit(10)->get(),
        );

        $Testimonios = Testimonios::inRandomOrder()->limit(5)->get();
        $MainBanneritemSub = null;


        // return view('website.coming_soon');
        return view('website.home', ['PRESENTS' => $PRESENTS, 'Testimonios' => $Testimonios, 'MainBanneritemSub' => $MainBanneritemSub, 'Blog' => $Blog, 'News_Events' => $News_Events, 'MainBanners' => $MainBanners, 'OfferBanners' => $OfferBanners, 'partners' => $partners, 'bestSell' => $bestSell]);
    }

    public function terms_policy()
    {
        $MainBanneritemSub = null;
        return view('website.terms_policy', ['MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function help_faq()
    {
        $MainBanneritemSub = null;
        return view('website.help_faq', ['MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function about()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 8)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $teamMem = $allTeams = Team::where('status', 1)->get();
        return view('website.about', ['teamMem' => $teamMem, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function miracleacademy()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 10)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $MainBanneritemSub_footer = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 10)->where('loaction_type', 2)->inRandomOrder()->get();
        return view('website.miracle-academy', ['MainBanneritemSub_footer' => $MainBanneritemSub_footer, 'MainBanneritemSub' => $MainBanneritemSub]);
    }


    public function miracleaccessories()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 12)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();

        return view('website.miracle-accessories', ['MainBanneritemSub' => $MainBanneritemSub]);
    }


    public function miraclesource()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 11)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $MainBanneritemSub_footer = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 11)->where('loaction_type', 2)->inRandomOrder()->get();
        return view('website.miracle-source', ['MainBanneritemSub_footer' => $MainBanneritemSub_footer, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function miraclebarsolutions()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 13)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $MainBanneritemSub_footer = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 13)->where('loaction_type', 2)->inRandomOrder()->get();
        return view('website.3600-miracle-&-bar-solutions', ['MainBanneritemSub_footer' => $MainBanneritemSub_footer, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function blog()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 9)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $Blog = Post::where('type', 1)->inRandomOrder()->get();
        return view('website.blog', ['Blog' => $Blog, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function Singleblog(Request $Request)
    {
        $MainBanneritemSub = null;
        $List = Post::find($Request->id);
        $postUser = User::find($List->updated_user);
        return view('website.single_blog', ['postUser' => $postUser, 'List' => $List, 'MainBanneritemSub' => $MainBanneritemSub]);
    }


    public function NewsEvent()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 14)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $news_event = Post::where('type', 2)->inRandomOrder()->get();
        return view('website.new-event', ['news_event' => $news_event, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function EventRegister(Request $Request)
    {
        $Event = new EventRegister();
        $Event->post_id = $Request->exampleInputId;
        $Event->fname = $Request->exampleInputName;
        $Event->lname = 'null';
        $Event->email = $Request->exampleInputEmail;
        $Event->mobile = $Request->exampleInputTel;
        $Event->company = $Request->exampleInputCompany;
        $Event->role = $Request->exampleInputDesignation;
        $Event->save();

        return redirect()->back();
    }

    public function SingleNewsEvent(Request $Request)
    {
        $MainBanneritemSub = null;
        $List = Post::find($Request->id);
        return view('website.single_miracleevent', ['List' => $List, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function OurPartners()
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 15)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        $partners = Partners::all();
        return view('website.our-partners', ['partners' => $partners, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function authPage()
    {
        $MainBanneritemSub = null;
        if (Auth::user()) {

            return Redirect::to('/my-account');
        } else {
            return view('website.user-login-register', ['MainBanneritemSub' => $MainBanneritemSub]);
        }

    }

    public function barshop(Request $Request)
    {
        $MainBanneritemSub = DB::table('banner_cat')->join('banner_img', 'banner_cat.id', '=', 'banner_img.banner_cat_id')->where('banner_cat.id', 16)->where('loaction_type', 1)->inRandomOrder()->limit(1)->first();
        // $productList = Products::where();
        $productList = DB::table('products');
        // $productList = $productList->join('product_categories', 'product_categories.product_id', '=', 'products.id');
        if ($Request->category) {
            $productList = $productList->join('product_categories', 'product_categories.product_id', '=', 'products.id');
            $productList = $productList->where('product_categories.value', $Request->category);
        }

        if ($Request->latest == true) {
            $productList = $productList->orderBy('products.created_at', 'DESC');
        }

        $productList = $productList->get();
        // dd($productList);

        $productCatList = ProductsCategory::all();
        $productTagList = ProductsTag::all();
        return view('website.shop.shop-home', ['productTagList' => $productTagList, 'productCatList' => $productCatList, 'products' => $productList, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function barshop_single(Request $Request)
    {
        $MainBanneritemSub = null;
        $productDetails = Products::find($Request->id);
        $productCatagoeries = DB::table('product_categories')->join('products_categories', 'products_categories.id', '=', 'product_categories.value')->where('product_categories.product_id', $Request->id)->get();
        $productTag = DB::table('product_tags')->join('products_tags', 'products_tags.id', '=', 'product_tags.value')->where('product_tags.product_id', $Request->id)->get();

        $productImage = ProductImage::where('product_id', $Request->id)->get();
        $realtive = HomeController::getRelatedProducts($Request->id);

        $realtive = HomeController::getRelatedProducts($Request->id);
        return view('website.shop.single-product', ['productImage' => $productImage, 'productTag' => $productTag, 'productCatagoeries' => $productCatagoeries, 'productDetails' => $productDetails, 'realtive' => $realtive, 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function getRelatedProducts($id)
    {
        $return = array();
        $product = Products::find($id);

        if ($product->item_color) {
            $item_color = Products::whereNotNull('item_color')->get();
            foreach ($item_color as $item_color_) {
                array_push($return, $item_color_);
            }
        }

        if ($product->item_country) {
            $item_country = Products::whereNotNull('item_country')->get();
            foreach ($item_country as $item_country_) {
                array_push($return, $item_country_);
            }
        }

        if ($product->item_appellation) {
            $item_appellation = Products::whereNotNull('item_appellation')->get();
            foreach ($item_appellation as $item_appellation_) {
                array_push($return, $item_appellation_);
            }
        }

        if ($product->item_producer) {
            $item_producer = Products::whereNotNull('item_producer')->get();
            foreach ($item_producer as $item_producer_) {
                array_push($return, $item_producer_);
            }
        }

        if ($product->item_environment) {
            $item_environment = Products::whereNotNull('item_environment')->get();
            foreach ($item_environment as $item_environment_) {
                array_push($return, $item_environment_);
            }
        }

        if ($product->item_format) {
            $item_format = Products::whereNotNull('item_format')->get();
            foreach ($item_format as $item_format_) {
                array_push($return, $item_format_);
            }
        }

        if ($product->item_varietals) {
            $item_varietals = Products::whereNotNull('item_varietals')->get();
            foreach ($item_format as $item_format_) {
                array_push($return, $item_format_);
            }
        }

        if ($product->best_sellers) {
            $best_sellers = Products::whereNotNull('best_sellers')->get();
            foreach ($best_sellers as $best_sellers_) {
                array_push($return, $best_sellers_);
            }
        }

        if ($product->item_type_category) {
            $item_type_category = Products::whereNotNull('item_type_category')->get();
            foreach ($item_type_category as $item_type_category_) {
                array_push($return, $item_type_category_);
            }
        }

        if ($product->item_rice_type) {
            $item_rice_type = Products::whereNotNull('item_rice_type')->get();
            foreach ($item_rice_type as $item_rice_type_) {
                array_push($return, $item_rice_type_);
            }
        }

        if ($product->item_rice_polishing_rate) {
            $item_rice_polishing_rate = Products::whereNotNull('item_rice_polishing_rate')->get();
            foreach ($item_rice_polishing_rate as $item_rice_polishing_rate_) {
                array_push($return, $item_rice_polishing_rate_);
            }
        }

        return $return;
    }

    public function barshop_filters(Request $Request)
    {
        // dd($Request);


        $filteredProducts = [];
        $filterData = [];

        if ($Request->filterEnvironment != null) {
            $filterData["item_environment"] = $Request->filterEnvironment;
        }
        if ($Request->filterColor != null) {
            $filterData["item_color"] = $Request->filterColor;
        }
        if ($Request->filterCountry != null) {
            $filterData["item_country"] = $Request->filterCountry;
        }
        if ($Request->filterAppellation != null) {
            $filterData["item_appellation"] = $Request->filterAppellation;
        }
        if ($Request->filterProducer != null) {
            $filterData["item_producer"] = $Request->filterProducer;
        }
        if ($Request->filterFormat != null) {
            $filterData["item_format"] = $Request->filterFormat;
        }
        if ($Request->filterVarietals != null) {
            $filterData["item_varietals"] = $Request->filterVarietals;
        }
        if ($Request->filter_Type_Category != null) {
            $filterData["item_type_category"] = $Request->filter_Type_Category;
        }
        if ($Request->filter_Rice_Type != null) {
            $filterData["item_rice_type"] = $Request->filter_Rice_Type;
        }
        if ($Request->filter_Rice_Polishing_Rate != null) {
            $filterData["item_rice_polishing_rate"] = $Request->filter_Rice_Polishing_Rate;
        }
        // dd($filterData);

        // $filterData = ['item_color'=> $Request->filterColor, 'item_country'=> $Request->filterCountry,'item_appellation'=> $Request->filterAppellation,'item_producer'=> $Request->filterProducer,'item_environment'=> $Request->filterEnvironment,'item_format'=> $Request->filterFormat,'item_varietals'=> $Request->filterVarietals,'item_type_category'=>$Request->filter_Type_Category,'item_rice_type'=>$Request->filter_Rice_Type,'item_rice_polishing_rate'=>$Request->filter_Rice_Polishing_Rate];
        // dd($filterData);
        if ($Request->category != 'No_Cat') {
            $CatAvalable = DB::table('product_categories')->select('product_categories.product_id')->join('products_categories', 'products_categories.id', '=', 'product_categories.value')->where('product_categories.value', $Request->category)->get();
            foreach ($CatAvalable as $CatAvalableItems) {
                $product = Products::where('id', '=', $CatAvalableItems->product_id)->where(function ($query) use ($filterData) {
                    $query->orwhere($filterData);
                })->first();
                if ($product != null) {
                    array_push($filteredProducts, $product);
                }

            }

        } else {
            $product = Products::orwhere($filterData)->get();
            $filteredProducts = $product;
        }
        return $filteredProducts;

    }

    public function barshop_checkout()
    {
        $MainBanneritemSub = null;

        if (session('cart') != null) {
            return view('website.shop.checkout', ['MainBanneritemSub' => $MainBanneritemSub]);
        } else {
            return redirect()->back();
        }


        // $MainBanneritemSub = null;
        // return view('website.shop.checkout',['MainBanneritemSub'=>$MainBanneritemSub]);
    }

    public function barshop_cart()
    {
        $MainBanneritemSub = null;
        return view('website.shop.cart', ['MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function myaccount()
    {
        $MainBanneritemSub = null;

        if (Auth::user()) {
            $parent = User::where('parent_id', Auth::user()->parent_id)->first();
            $childUsers = User::where('parent_id', Auth::user()->id)->get();
            $orders = Sale::where('customer_id', Auth::user()->id)->with('saleproduct', 'salebill')->orderBy('created_at', 'DESC')->get();
            //    dd($orders);
            return view('website.shop.myaccount', ['MainBanneritemSub' => $MainBanneritemSub, 'orders' => $orders, 'childUsers' => $childUsers, 'parent' => $parent]);

        } else {
            return Redirect::to('/login');
        }
    }


    public function Register(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            if ($error) {
                session()->flash('success', 'Error , ' . $error);
            }

        }

        $validat_val = $validator->validate();
        $user_name = $request->first_name . '' . $request->last_name;
        $user_phone = $request->phone;
        $user_email = $validat_val['email'];
        $user_password = Hash::make($validat_val['password']);

        $User = new User();
        $User->name = $user_name;
        $User->email = $user_email;
        $User->phone = $user_phone;
        $User->password = $user_password;
        // if($image = $request->file('uimage')){
        //     $user_image_path = Storage::putFile('userAdminImage',$image , 'public');
        //     $User->img = $user_image_path;
        // }

        $User->type = 2;
        //type = Admin
        $User->save();
        // if(){

        // }else{

        // }
        if ($User) {
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("hello@miraclecosmatics.com", "hello@miraclecosmatics");
            $email->setSubject("Wellcome :: miraclecosmatics.com");
            $email->addTo($user_email, $user_name);
            $email->addContent(
                "text/html", "<h3>User Register Successfully</h3><br><br><p>Wellcome:" . $user_name . "</p>"
            );
            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);

            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
        }

        session()->flash('success', 'User Registered Successfully');
        return redirect()->back();
    }


    public function updateUser(Request $request)
    {
        // dd($request);


        $user_name = $request->exampleInputCompany;
        $user_phone = $request->exampleInputPhone;
        $user_email = $request->exampleInputEmail1;



        // $user_password=Hash::make($validat_val['password']);

        $User = User::find(Auth::user()->id);
        $User->name = $user_name;
        $User->email = $user_email;
        $User->phone = $user_phone;
        // dd(Hash::check($request->current_pwd, Auth::user()->password));
        if (Hash::check($request->current_pwd, Auth::user()->password)) {

            if ($request->new_pwd) {
                if ($request->confirm_pwd == $request->new_pwd) {
                    $user_password = Hash::make($request->confirm_pwd);
                    $User->password = $user_password;

                    $User->update();
                    session()->flash('success', 'User Update with Password Successfully');
                }
            }
        } else {
            $User->update();
            session()->flash('success', 'User Update Successfully');
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        // $cat = $request->category;
        // $search_text = $request->search_text;
        $MainBanneritemSub = null;
        // $data_search = $this->searchData($cat,$search_text);
        return view('website.search', ['searchCat' => '', 'searchVal' => '', 'data_search' => '', 'MainBanneritemSub' => $MainBanneritemSub]);
    }

    public function search_(Request $request)
    {
        switch ($request->type) {
            case 3:
                $ProductsAttributes = ProductsAttributes::select('id')->where('atributes_', 'like', '%' . $request->key . '%')->get();
                $AttributesId = array();
                $Attributes = array();
                $return = array();
                foreach ($ProductsAttributes as $ProductsAttrId) {

                    array_push($AttributesId, $ProductsAttrId->id);

                }
                $AttrValues = DB::table('product_attributes')->where('value', $AttributesId)->get();
                foreach ($AttrValues as $AttrValue) {

                    array_push($Attributes, $AttrValue->product_id);

                }

                foreach ($Attributes as $Attribute) {

                    $value = Products::where('id', $Attribute)->first();
                    array_push($return, $value);
                }

                return $return;

            case 2:
                $ProductsCategory = ProductsCategory::select('id')->where('name', $request->key)->get();
                $CatId = array();
                $productId = array();
                $return = array();
                foreach ($ProductsCategory as $CategoryId) {

                    array_push($CatId, $CategoryId->id);

                }
                $catValues = DB::table('product_categories')->where('value', $CatId)->get();

                foreach ($catValues as $catValue) {

                    array_push($productId, $catValue->product_id);

                }

                foreach ($productId as $productId) {

                    $value = Products::where('id', $productId)->first();
                    array_push($return, $value);
                }

                return $return;
                break;
            case 1:
                return Products::where('name', 'like', '%' . $request->key . '%')->get();
                break;
            default:
                $return = array();

                $Products = Products::where('name', 'like', '%' . $request->key . '%')->get();

                foreach ($Products as $Product) {
                    array_push($return, $Product);
                }


                $ProductsCategory = ProductsCategory::select('id')->where('name', $request->key)->get();
                $CatId = array();
                $productId = array();

                foreach ($ProductsCategory as $CategoryId) {

                    array_push($CatId, $CategoryId->id);

                }
                $catValues = DB::table('product_categories')->where('value', $CatId)->get();

                foreach ($catValues as $catValue) {

                    array_push($productId, $catValue->product_id);

                }

                foreach ($productId as $productId) {

                    $value = Products::where('id', $productId)->first();
                    array_push($return, $value);
                }


                $ProductsAttributes = ProductsAttributes::select('id')->where('atributes_', 'like', '%' . $request->key . '%')->get();
                $AttributesId = array();
                $Attributes = array();
                foreach ($ProductsAttributes as $ProductsAttrId) {

                    array_push($AttributesId, $ProductsAttrId->id);

                }
                $AttrValues = DB::table('product_attributes')->where('value', $AttributesId)->get();
                foreach ($AttrValues as $AttrValue) {

                    array_push($Attributes, $AttrValue->product_id);

                }

                foreach ($Attributes as $Attribute) {

                    $value = Products::where('id', $Attribute)->first();
                    array_push($return, $value);
                }

                return array_unique($return);
                break;
        }
    }


    public function searchData($cat, $search_text)
    {
        // dd($cat);
        $returnDATA = null;
        if ($cat == 'All' || $cat == 1) {
            $data_search1 = Products::where('name', 'like', '%' . $search_text . '%')->get();
            $data_search2 = Post::where('title', 'like', '%' . $search_text . '%')->get();
            $returnDATA = ['Product' => $data_search1, 'Post' => $data_search2];
        } elseif ($cat == 'Product' || $cat == 2) {
            $data_search = Products::where('name', 'like', '%' . $search_text . '%')->get();
            $returnDATA = ['Product' => $data_search, 'Post' => null];
        } elseif ($cat == 'Blog & Events' || $cat == 3) {
            $data_search = Post::where('title', 'like', '%' . $search_text . '%')->get();
            $returnDATA = ['Product' => null, 'Post' => $data_search];
        }

        if ($returnDATA != null) {
            return $returnDATA;
        } else {
            return false;
        }

    }

    public function productrate(Request $request)
    {
        $rate = new Rate();
        $rate->product_id = $request->id;
        if (Auth::user()) {
            $rate->user = Auth::user()->id;
        } else {
            $rate->user = 'anonymous';
        }
        $rate->rate = $request->rate;
        $rate->review = $request->review;

        $rate->save();
    }


    public function getProductNames()
    {
        return Products::select('name')->get();
    }

    public function getCategoryNames()
    {
        return ProductsCategory::select('name')->get();
    }

    public function getAppliactionNames()
    {
        return ProductsAttributes::select('atributes_')->where('attributes_Type', 'Appellations')->get();
    }

    public function getAllNames()
    {
        $return = array();
        foreach (Products::select('name')->get() as $Products) {
            array_push($return, $Products);
        }

        foreach (ProductsCategory::select('name')->get() as $ProductsCategory) {
            array_push($return, $ProductsCategory);
        }

        foreach (ProductsAttributes::select('atributes_ as name')->where('attributes_Type', 'Appellations')->get() as $ProductsAttributes) {
            array_push($return, $ProductsAttributes);
        }

        return array_unique($return);
    }

    public function contactUs(Request $request)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('info@miraclecosmatics.com');
        $email->setSubject("Conatct us :: miraclecosmatics.com");
        $email->addTo('sasithwarnakafonseka@gmail.com');
        $email->addContent(
            "text/html", "Thank you for contact us, <br>message::" . $request->message . "</p>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);

        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
        return redirect()->back();
    }
}