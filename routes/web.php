<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontendController@index' );
Route::get('/contact','FrontendController@contact');
Route::get('/contact/admin','FrontendController@contactsent');
Route::get('/seen/contect/{contectseen}','FrontendController@seencontect');
Route::get('/about','FrontendController@about');
Route::get('/product/details/{product_id}','FrontendController@productdetails');
Route::get('/shop','FrontendController@shop');

Auth::routes(['verify' =>true]); //email verify
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// CategoryController
Route::get('/add/category', 'CategoryController@addcategory');
Route::post('/add/category/post', 'CategoryController@addcategorypost');
Route::get('/update/category/{category_id}', 'CategoryController@updatecategory');
Route::post('/update/category/post', 'CategoryController@updatecategorypost');
Route::get('/delete/category/{category_id_delete}', 'CategoryController@deletecategory');
Route::get('/restore/category/{category_id_restore}', 'CategoryController@restorecategory');
Route::get('/harddelete/category/{category_id_hard}', 'CategoryController@harddeletecategory');
// profile Controller
Route::get('/Profile', 'ProfileController@index');
Route::post('/profile/post', 'ProfileController@profilepost');
Route::post('/password/post', 'ProfileController@passwordpost');

//contact Controller
Route::post('/contact/post','ContactController@contact');




// product controller
Route::get('/add/product','ProductController@addproduct');
Route::post('/add/product/post','ProductController@addproductpost');

// Cart Controller
Route::get('/cart','CartController@cart');
Route::get('/cart/{coupon_name}','CartController@cart');
Route::get('/cart/delete/{cart_id}','CartController@cartdelete');
Route::post('/add/to/cart','CartController@addtocart');
Route::post('/cart/update','CartController@cartupdate');

//slider Controller
Route::get('/slider','SliderController@slider');
Route::post('/slider/post','SliderController@sliderpost');
Route::get('/slider/deletes/{slider_id}','SliderController@sliderdeletes');

// Coupon Controller
Route::get('/add/coupon','CouponController@addcoupon');
Route::post('/add/coupon/post','CouponController@addcouponpost');
Route::get('/coupon/delete/{coupon_id}','CouponController@coupondelete');

// Check Controller
Route::post('/checkout','CheckController@index');
Route::post('/checkbox/post','CheckController@checkoutpost');

// Customer_register Controller
Route::get('/customer/register','Customer_registerController@customerregister');
Route::post('/customer/register/post','Customer_registerController@customerregisterpost');

// stripe Controller
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
