<?php

use Illuminate\Support\Facades\Route;

//Customer controllers
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\WebPageController;
use App\Http\Controllers\Customer\HomeAuthController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\SaleController;
//admin controllers
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\MobileNotificationController;
use App\Http\Controllers\Admin\UserManagemetController;
use App\Http\Controllers\Admin\EcomController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ModuleMarketingController;
use App\Http\Controllers\Admin\ModuleProductsController;
use App\Http\Controllers\Admin\ModulePostsController;
use App\Http\Controllers\Admin\WebNotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\CookiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





// Auth::routes();
// Authentication Routes...
Route::get('cp', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('cp', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// web page start

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// main nav start
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [HomeController::class, 'about'])->name('/about');
Route::get('terms_policy', [HomeController::class, 'terms_policy'])->name('terms_policy');
Route::get('help_faq', [HomeController::class, 'help_faq'])->name('help_faq');

Route::post('contact-us', [HomeController::class, 'contactUs'])->name('contactus');
// main nav end 

Route::get('/blog/single/{id}', [HomeController::class, 'Singleblog'])->name('/blog/single/{id}');
Route::get('/blog', [HomeController::class, 'blog'])->name('/blog');
Route::get('/news-event/single/{id}', [HomeController::class, 'SingleNewsEvent'])->name('/news-event/single/{id}');
Route::get('/news-event', [HomeController::class, 'NewsEvent'])->name('/news-event');
Route::post('/register/event', [HomeController::class, 'EventRegister'])->name('register.event');
Route::get('/our-partners', [HomeController::class, 'OurPartners'])->name('/our-partners');

//shop page start
Route::get('/shop', [HomeController::class, 'barshop'])->name('/shop');
// Route::get('/shop/{category}/{categoryName}', [HomeController::class, 'barshop_category'])->name('/shop/{category}/{categoryName}');
Route::get('/shop/product/{id}/{name}', [HomeController::class, 'barshop_single'])->name('/shop/product/{id}/{name}');
Route::post('/shop/product/rate', [HomeController::class, 'productrate'])->name('/shop/product/rate');
// Route::get('/shop/offers', [HomeController::class, 'barshop_offers'])->name('/shop/offers');

Route::get('/shop/filters', [HomeController::class, 'barshop_filters'])->name('/shop/filters');
Route::get('/shop/cart', [HomeController::class, 'barshop_cart'])->name('/shop/cart');
Route::get('/shop/checkout', [HomeController::class, 'barshop_checkout'])->name('/shop/checkout');
Route::get('/myaccount', [HomeController::class, 'myaccount'])->name('/myaccount');

Route::get('add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::post('add-neworder', [SaleController::class, 'CreateSale'])->name('add.neworder');


//search start
Route::get('/search', [HomeController::class, 'search'])->name('/search');
Route::get('/search/get/products', [HomeController::class, 'getProductNames'])->name('/search/get/products');
Route::get('/search/get/category', [HomeController::class, 'getCategoryNames'])->name('/search/get/category');
Route::get('/search/get/appliaction', [HomeController::class, 'getAppliactionNames'])->name('/search/get/appliaction');
Route::get('/search/get/all', [HomeController::class, 'getAllNames'])->name('/search/get/all');
Route::post('search/web', [HomeController::class, 'search_'])->name('search.web');
//search end

//shop page end

// user managemet routs start
Route::get('/register', function () {
    return redirect('/login-register');
});
Route::get('/login', function () {
    return redirect('/login-register');
});
Route::get('/login-register', [HomeController::class, 'authPage'])->name('/login-register');
Route::POST('/login-register/register', [HomeController::class, 'Register'])->name('login-register.register');
Route::POST('/login-register/update', [HomeController::class, 'updateUser'])->name('login-register.update');
Route::get('my-account', [HomeController::class, 'myaccount'])->name('my-account');

// user managemet routs end

// web page end

//FIRBASE Notifications START

Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::post('/send-web-notification-user', [WebNotificationController::class, 'sendWebNotificationUser'])->name('send.web-notification-user');

//FIRBASE Notifications End





// Route::view('/', 'chat')->middleware('auth');
// Route::resource('messages', 'MessageController')->only([
//     'index',
//     'store'
// ]);


//Dashboard Start

Route::get('/admin_dashboard', [AdminDashboard::class, 'index'])->name('/admin_dashboard');

//Dashboard End


//Ecom  Start
Route::get('/Ecom', [EcomController::class, 'index'])->name('Ecom');
Route::post('/Ecom/delete', [EcomController::class, 'delete'])->name('ecom.delete');
Route::post('/Ecom/change/status', [EcomController::class, 'change_status'])->name('ecom.change.status');
//Ecom  End

//Module Marketing Start
Route::get('/ModuleMarketing/WebPages', [ModuleMarketingController::class, 'Banners'])->name('ModuleMarketing/WebPages');

Route::post('ModuleMarketing/Banners/add_cat', [ModuleMarketingController::class, 'AddCat'])->name('ModuleMarketing/Banners/add_cat');
Route::get('ModuleMarketing/Banners/get_list', [ModuleMarketingController::class, 'GetListBanners'])->name('ModuleMarketing/Banners/get_list');
Route::post('ModuleMarketing/Banners/addNew', [ModuleMarketingController::class, 'addNewBanner'])->name('ModuleMarketing/Banners/addNew');
Route::post('ModuleMarketing/Banners/deleteBanner', [ModuleMarketingController::class, 'deleteBanner'])->name('ModuleMarketing/Banners/deleteBanner');
Route::post('ModuleMarketing/Banners/editBanner', [ModuleMarketingController::class, 'editBanner'])->name('ModuleMarketing/Banners/editBanner');
Route::post('ModuleMarketing/meta/add', [ModuleMarketingController::class, 'addMeta'])->name('ModuleMarketing/meta/add');
Route::post('ModuleMarketing/meta/edit', [ModuleMarketingController::class, 'editMeta'])->name('ModuleMarketing/meta/edit');
Route::post('ModuleMarketing/meta/delete', [ModuleMarketingController::class, 'deleteMeta'])->name('ModuleMarketing/meta/delete');

Route::get('/ModuleMarketing/Testimonios', [ModuleMarketingController::class, 'Testimonios'])->name('ModuleMarketing/Testimonios');
Route::post('ModuleMarketing/Testimonio/addnew', [ModuleMarketingController::class, 'addNewTestimonios'])->name('ModuleMarketing/Testimonio/addnew');
Route::post('ModuleMarketing/Testimonio/destroy_testimonio', [ModuleMarketingController::class, 'destroyTestimonios'])->name('ModuleMarketing/Testimonio/destroy_testimonio');
Route::post('ModuleMarketing/Testimonio/edit_testimonio', [ModuleMarketingController::class, 'editTestimonios'])->name('ModuleMarketing/Testimonio/edit_testimonio');


Route::get('/ModuleMarketing/Partners', [ModuleMarketingController::class, 'Partners'])->name('ModuleMarketing/Partners');
Route::post('/ModuleMarketing/Partners/addnew', [ModuleMarketingController::class, 'addNewPartners'])->name('ModuleMarketing/Partners/addnew');
Route::post('ModuleMarketing/Partners/destroy_partners', [ModuleMarketingController::class, 'destroyPartners'])->name('ModuleMarketing/Partners/destroy_partners');



Route::get('/ModuleMarketing/Teams', [ModuleMarketingController::class, 'Teams'])->name('ModuleMarketing/Teams');
Route::post('/ModuleMarketing/Teams/edit', [ModuleMarketingController::class, 'editTeams'])->name('/ModuleMarketing/Teams/edit');

Route::post('ModuleMarketing/Teams/destroy_team_member', [ModuleMarketingController::class, 'destroy_team_member'])->name('ModuleMarketing/Teams/destroy_team_member');
Route::post('/ModuleMarketing/Teams/addnew', [ModuleMarketingController::class, 'addTeam'])->name('/ModuleMarketing/Teams/addnew');
//Module Marketing End


//Module Products Start
Route::get('/ModuleProducts', [ModuleProductsController::class, 'index'])->name('ModuleProducts');
Route::POST('/ModuleProducts/addProduct', [ModuleProductsController::class, 'addProduct'])->name('ModuleProducts/addProduct');
Route::POST('ModuleProducts/Product/delete', [ModuleProductsController::class, 'deleteProduct'])->name('ModuleProducts/Product/delete');
Route::POST('ModuleProducts/Product/editProduct', [ModuleProductsController::class, 'editProduct'])->name('ModuleProducts/Product/editProduct');
Route::POST('/ModuleMarketing/product/detailsList', [ModuleProductsController::class, 'detailsList'])->name('/ModuleMarketing/product/detailsList');
Route::POST('/ModuleProducts/product/bestsale', [ModuleProductsController::class, 'bestsale'])->name('/ModuleProducts/product/bestsale');
Route::POST('/ModuleProducts/product/bestsale/remove', [ModuleProductsController::class, 'bestsale_remove'])->name('/ModuleProducts/product/bestsale/remove');
Route::GET('/ModuleProducts/product/getproduct/id', [ModuleProductsController::class, 'getproductbyid'])->name('/ModuleProducts/product/getproduct/id');
Route::GET('/ModuleProducts/product/getuser/id', [ModuleProductsController::class, 'getordersbyuser'])->name('/ModuleProducts/product/getuser/id');


//barnds start
Route::POST('/ModuleProducts/Brands/add', [ModuleProductsController::class, 'addBrands'])->name('ModuleProducts/Brands/add');
Route::POST('/ModuleProducts/Brands/delete', [ModuleProductsController::class, 'deleteBrands'])->name('ModuleProducts/Brands/delete');
Route::POST('/ModuleProducts/Brands/edit', [ModuleProductsController::class, 'editBrands'])->name('ModuleProducts/Brands/edit');
//barnds end
//Category start
Route::POST('/ModuleProducts/Category/add', [ModuleProductsController::class, 'addCategory'])->name('ModuleProducts/Category/add');
Route::POST('/ModuleProducts/Category/delete', [ModuleProductsController::class, 'deleteCategory'])->name('ModuleProducts/Category/delete');
Route::POST('/ModuleProducts/Category/edit', [ModuleProductsController::class, 'editCategory'])->name('ModuleProducts/Category/edit');
//Category end
//Tag start
Route::POST('/ModuleProducts/Tag/add', [ModuleProductsController::class, 'addTag'])->name('ModuleProducts/Tag/add');
Route::POST('/ModuleProducts/Tag/delete', [ModuleProductsController::class, 'deleteTag'])->name('ModuleProducts/Tag/delete');
Route::POST('/ModuleProducts/Tag/edit', [ModuleProductsController::class, 'editTag'])->name('ModuleProducts/Tag/edit');
//Tag end
//Attributes start
Route::POST('/ModuleProducts/Attributes/add', [ModuleProductsController::class, 'addAttributes'])->name('ModuleProducts/Attributes/add');
Route::POST('/ModuleProducts/Attributes/delete', [ModuleProductsController::class, 'deleteAttributes'])->name('ModuleProducts/Attributes/delete');
Route::POST('/ModuleProducts/Attributes/edit', [ModuleProductsController::class, 'editAttributes'])->name('ModuleProducts/Attributes/edit');
//Attributes end
//Module Products End

//Module Posts Start
Route::get('/ModulePosts', [ModulePostsController::class, 'index'])->name('ModulePosts');
Route::post('/ModulePosts/addNewPost', [ModulePostsController::class, 'addNewPost'])->name('ModulePosts/addNewPost');
Route::post('/ModulePosts/destroy_post', [ModulePostsController::class, 'destroy_post'])->name('ModulePosts/destroy_post');
Route::post('/ModulePosts/editPost', [ModulePostsController::class, 'editPost'])->name('ModulePosts/editPost');
//Module Posts End

//Notification Start
Route::get('/MobileNotification', [MobileNotificationController::class, 'index'])->name('MobileNotification');
//Notification End


//User Managemet Start
Route::get('/UserManagemet', [UserManagemetController::class, 'index'])->name('UserManagemet');
Route::post('/UserManagemet/addNewUser', [UserManagemetController::class, 'addNewUser'])->name('UserManagemet/addNewUser');
Route::post('/UserManagemet/destroy_user', [UserManagemetController::class, 'destroy_user'])->name('UserManagemet/destroy_user');
Route::post('/UserManagemet/editUser', [UserManagemetController::class, 'editUser'])->name('UserManagemet/editUser');
//User Managemet end

//User Profile Start
Route::get('/MyProfile', [ProfileController::class, 'index'])->name('MyProfile');
Route::get('/ProfileSettings', [ProfileController::class, 'settings'])->name('ProfileSettings');
Route::post('/edit/user', [ProfileController::class, 'UserEdit'])->name('edit.user');
Route::post('/edit/user/pasword', [ProfileController::class, 'EditPass'])->name('edit.user.pasword');
//User Profile End


// reports start 
Route::get('/report/sales', [ReportController::class, 'index'])->name('report.sales');
Route::get('/report/sales/getsalesbydate', [ReportController::class, 'getSalesByDate'])->name('report.sales.getsalesbydate');
Route::get('/report/sales/getproductbyid', [ReportController::class, 'getproductbyid'])->name('/report/sales/getproductbyid');
// reports end 


//cookies
Route::get('/setcookies', [CookiesController::class, 'setcookies'])->name('setcookies');
Route::get('/getcookies', [CookiesController::class, 'getcookies'])->name('getcookies');