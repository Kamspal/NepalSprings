<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'API\\AuthController@login');
//     Route::post('logout', 'API\\AuthController@logout');
//     Route::post('refresh', 'API\\AuthController@refresh');
//     Route::get('me', 'API\\AuthController@me');

// });


Route::group([
        'middleware' => 'auth:api'
    ], function () {
        
    
    });
    Route::post('signup', 'API\\APIController@signup');
    Route::post('login', 'API\\APIController@login');
    Route::post('logout', 'API\\APIController@logout');
    // Route::post('login', 'API\\APIController@validateUserlogin');
    // Route::get('logout', 'API\\APIController@logout');
    // Route::get('user', 'API\\APIController@user');
    // Route::get('menu','API\\APIController@Menu');
    Route::get('find-sub-menu/{id}','API\\APIController@subMenu');
    Route::get('all-categories', 'API\\APIController@viewCategory');
    Route::get('category/{id}', 'API\\APIController@catProducts');
    Route::get('all-categories-images', 'API\\APIController@viewCategoryImage');
    Route::get('find-products/{id}', 'API\\APIController@viewProduct');
    Route::get('get-product-details/{id}', 'API\\APIController@productDetail');
    Route::get('get-slider', 'API\\APIController@slider');
    Route::get('get-second_slider', 'API\\APIController@second_slider');
    Route::get('latest-products', 'API\\APIController@getLatestProduct');
    Route::get('featured-products', 'API\\APIController@getFeaturedProduct');
    Route::get('top-products', 'API\\APIController@getTopProduct');
    Route::get('similar-products/{id}', 'API\\APIController@getSimilarProduct');
    Route::get('search', 'API\\APIController@searchResult');
    Route::get('logo', 'API\\APIController@logo');
    Route::post('checkout','API\\APIController@checkout');
    Route::get('hompage_vendor_image_with_url', 'API\\APIController@hompage_vendor_image_with_url');
    Route::post('changePassword','API\\APIController@changePassword');
    Route::post('updateUser/{id}','API\\APIController@updateUser');
    Route::get('order_history_details/{id}','API\\APIController@UserOrderHistory');
    Route::post('updateUserImage/{id}','API\\APIController@updateUserImage');
    Route::get('order_history/{id}','API\\APIController@UserOrder');
    Route::get('delivered_order_history/{id}','API\\APIController@DeliveredUserOrder');
    Route::get('companyInfo', 'API\\APIController@companyInfo');
    Route::POST('custom_order/{id}', 'API\\APIController@Customorder');
    Route::post('forgot-password', function (Request $request) {
        
        $request->validate(['email' => 'required|email']);
    
        $status = password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? (['status' => __($status)])
                    : (['email' => __($status)]);
    });
    
    

