<?php

use App\Http\Controllers\OrderController;
use App\Product;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

Route::get('/product-hover',function(){
    
	return view('hover on zoom');
});

Route::get('connect-vendors', 'VendorController@index');
Route::post('connect-vendors', 'VendorController@store');


Route::get('/','IndexController@index');
Route::get('/latest-product','IndexController@latestProduct');
Route::get('/feature-product','IndexController@featureProduct');
Route::get('/top-product','IndexController@topProduct');
Route::get('/product-main-category/{id}','CategoryController@productSubmenuDisplay');
Route::get('/shop','ShopController@shop');
Route::get('/product-category/{id}','CategoryController@productCategoryDisplay');
Route::match(['get','post'],'/admin','AdminController@login');
Route::match(['get','post'],'/signup','AdminController@register');
Route::view('/customer','customer');
Route::get('/logout','AdminController@logout');
Route::get('/testing',function(){
    $product = Product::all();
	return view('test', compact('product'));
});
Route::get('/popup',function(){
    
	return view('index');
});
Route::get('/fetch-cart','CartController@fetchCart');
Route::get('/test',function(){

    $order=App\Order::where('user_id',46)->orderBy('id', 'DESC')->get();
  

return view('client_emails.order_invoice',compact('order'));
	
});


//Forget password routes 
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
});


Route::post('forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
});

Route::match(['get','post'],'/admin/reset-pwd','AdminController@passwordReset');
Route::get('/normaluser','NormalUserController@index')->middleware('auth');
Route::get('/normaluser/create','NormalUserController@create')->middleware('auth');
Route::post('/normaluser/store','NormalUserController@store')->middleware('auth');
Route::get('/normaluser/edit/{id}','NormalUserController@edit')->middleware('auth');
Route::post('/normaluser/update/{id}','NormalUserController@update')->middleware('auth');
Route::get('change-password', 'ChangePasswordController@index')->middleware('auth');
Route::post('change-password', 'ChangePasswordController@store')->middleware('auth');
Route::group(['middleware' => 'normaluser'],function(){
  
});
Route::get('/product-details/{id}','ProductController@productDetail');
Route::get('/search','IndexController@search');

// Route::get('search',array('as'=>'search','uses'=>'IndexController@searc'));
Route::get('autocomplete/{name}','IndexController@autocomplete');

Route::group(['middleware' => 'admin'],function(){
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/settings','AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkPassword');
// Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

//Categories Routes(Admin)
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::get('/admin/view-category','CategoryController@viewCategory');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');

Route::post('/find-sub-menu','CategoryController@getSubmenu');

//Product Routes

Route::match(['get','post'],'/admin/add-product','ProductController@addProduct');
Route::get('/admin/view-product','ProductController@viewProduct');
Route::match(['get','post'],'/admin/edit-product/{id}','ProductController@editProduct');
Route::match(['get','post'],'/admin/delete-product/{id}','ProductController@deleteProduct');
Route::get('/admin/delete-product-image/{id}','ProductController@deleteProductImage');


//Product Attributes Routes
Route::match(['get','post'],'admin/add-attribute/{id}','ProductController@addAttribute');
//Product Attributes Delete
Route::get('/admin/delete-product-attributes/{id}','ProductController@deleteProductAttributes');

//Menu Addition/Edit/Destroy.
Route::match(['get','post'],'/admin/add-menu','MenuController@createMenu');
Route::get('/admin/view-menu','MenuController@show');
Route::get('/admin/delete-menu/{id}','MenuController@destroy');
Route::match(['get','post'],'/admin/edit-menu/{id}','MenuController@editMenu');

//SUbMenu Addition/Edit/Destroy.
Route::match(['get','post'],'/admin/add-submenu','SubMenuController@createSubMenu');
Route::get('/admin/view-submenu','SubMenuController@show');
Route::get('/admin/delete-submenu/{id}','SubMenuController@destroy');
Route::match(['get','post'],'/admin/edit-submenu/{id}','SubMenuController@editSubMenu');

//Popup
Route::match(['get','post'],'/admin/add-popup','PopupController@createPopup');
Route::get('/admin/view-popup','PopupController@showPopup');
Route::get('/popup/{id}/edit','PopupController@editPopup');
Route::post('/popup/{id}/update','PopupController@updatePopup');
Route::get('/popup/{id}/delete','PopupController@destroy');

//slider 

Route::resource('slider', 'SliderController')->middleware('auth');
Route::post('/slider/{id}/update', 'SliderController@update')->middleware('auth');
Route::get('/slider/{id}/delete','SliderController@destroy');

Route::resource('secondslider', 'SecondSliderController')->middleware('auth');
Route::post('/secondslider/{id}/update', 'SecondSliderController@update')->middleware('auth');
Route::get('/secondslider/{id}/delete','SecondSliderController@destroy');

Route::get('/print/{id}','OrderController@Print');

//orders
Route::get('/admin/orders','OrderController@orderStatus');
Route::get('/admin/order-delete/{id}','OrderController@orderDelete');

Route::post('/change-status/{id}','OrderController@changeStatus');

Route::get('/admin/add-order-value','OrderController@orderAddValue');
Route::get('/admin/view-order-value','OrderController@orderViewValue');
Route::get('/admin/edit-order-value/{id}','OrderController@orderEditValue');
Route::post('/admin/edit-order-value/{id}','OrderController@orderEditValue');
});


Route::match(['get','post'],'/add-to-cart/{id}','CartController@getAddToCart');
Route::match(['get','post'],'/add-cart/{id}','CartController@AddToCart');
Route::get('/show-cart','CartController@showCart');
Route::get('/cart','CartController@displayCart');
Route::get('/check-coupon','CartController@checkCoupon');
Route::get('/delete-cart/{id}','CartController@sessionDelete');
Route::post('/guest-checkout','CartController@guestCheckout');
Route::get('/guest-checkout','CartController@guestCheckout');
Route::get('/orders','OrderController@resultCheckout')->middleware('auth');
Route::post('/add-to-session/{id}','CartController@addSession');
Route::post('/orders','OrderController@resultCheckout');
Route::post('/user-checkout','OrderController@userCheckout')->middleware('auth');
Route::get('/user-checkout','OrderController@userCheckout')->middleware('auth');
Route::get('/payment','OrderController@Payment')->middleware('auth');
Route::post('/payment','OrderController@Payment')->middleware('auth');
Route::get('/delete-add-cart/','CartController@deleteCart');
//Cart

Route::resource('coupon', 'CouponController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/slick-slider-image', function () {
    return view('slick-slider');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/privacy-policy',function(){
    
	return view('privacy-policy');
});
Route::get('/return-policy',function(){
    
	return view('return-policy');
});
Route::get('/terms-of-use',function(){
    
	return view('terms-of-use');
});
Route::get('/shipping-policy',function(){
    
	return view('shipping-policy');
});
Route::get('/payment-policy',function(){
    
	return view('payment-policy');
});

Route::get('/products',function(){
    
	return view('products');
});

Route::get('/contact-us',function(){
    
	return view('contact-us');
});

Route::get('/about-us',function(){
    
	return view('about-us');
});
