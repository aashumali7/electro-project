<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

  /*   Frontend Routes */

Route::get('/', function () {
    return view('home');
})->name('homeroute');

Route::post('/login',[AuthController::class,'login'])->name('login');

Route::prefix('shop')->group(function () {

    Route::get('/cart',function(){
        return view('shop/cart'); //shop/cart.blade.php
    });
    Route::get('/wishlist',function(){
        return view('shop/wishlist'); //shop-wishlist.blade.php
    });
    Route::get('/shop-grid',function(){
            return view('shop/shop-grid'); //shop-grid.blade.php
    });
    Route::get('/single-product-extend',function(){
            return view('shop/single-product-extend'); //single-product-extend.blade.php
    });
    Route::get('/my-account',function(){
            return view('shop/my-account'); //my-account.blade.php
    });
    Route::get('/track-your-order',function(){
            return view('shop/track-your-order'); //track-your-order.blade.php
    });
    Route::get('/compare',function(){
            return view('shop/compare'); //compare.blade.php
    });
    Route::get('/checkout',function(){
            return view('shop/checkout'); //checkout.blade.php
    });
    Route::get('/shop',function(){
            return view('shop/shop'); //shop.blade.php
    });
});

Route::get('/about',function(){
       return view('about'); //about.blade.php
});
Route::get('/faq',function(){   
       return view('faq'); //faq.blade.php
});
Route::get('/store-directory',function(){
       return view('store-directory'); //store-directory.blade.php
});
Route::get('/terms-and-conditions',function(){
       return view('terms-and-conditions'); //terms-and-conditions.blade.php
});
Route::get('/home-v2',function(){
       return view('home-v2'); //home-v2.blade.php
});
Route::get('/home-v3',function(){
       return view('home-v3'); //home-v3.blade.php
});
Route::get('/home-v4',function(){
       return view('home-v4'); //home-v4.blade.php
});
Route::get('/home-v4',function(){
       return view('home-v4'); //home-v4.blade.php
});
Route::get('/home-v5',function(){
       return view('home-v5'); //home-v5.blade.php
});
Route::get('/home-v6',function(){
       return view('home-v6'); //home-v6.blade.php
});
Route::get('/home-v7',function(){
       return view('home-v7'); //home-v7.blade.php
});
Route::get('/contact-v1',function(){
       return view('contact-v1'); //contact-v1.blade.php
});
Route::get('/contact-v2',function(){
       return view('contact-v2'); //contact-v2.blade.php
});
Route::get('/home-v3-fullcolor',function(){
       return view('home-v3-fullcolor'); //home-v3-fullcolor.blade.php
});

  /*  backend/Admin Routes */

Route::prefix('admin')->group(function () {
       Route::get('/', function () {
              return view('admin.login'); //login.blade.php
       });
       Route::get('/login', function () {
              return view('admin.login'); //login.blade.php
       });
       Route::get('/dashboard', function () {
              return view('admin.dashboard'); //dashboard.blade.php
       });
       /* only for practice */

       Route::get('/general', function () {
              return view('admin.general'); //general.blade.php
       });
       Route::get('/widgets', function () {
              return view('admin.widgets'); //widgets.blade.php
       });
       Route::get('/top-nav', function () {
              return view('admin.top-nav'); //top-nav.blade.php
       });
       Route::get('/top-nav-sidebar', function () {
              return view('admin.top-nav-sidebar'); //top-nav-sidebar.blade.php
       });
       Route::get('/boxed', function () {
              return view('admin.boxed'); //boxed.blade.php
       });
       Route::get('/fixed-sidebar', function () {
              return view('admin.fixed-sidebar'); //fixed-sidebar.blade.php
       });
       Route::get('/fixed-sidebar-custom', function () {
              return view('admin.fixed-sidebar-custom'); //fixed-sidebar-custom.blade.php
       });
       Route::get('/collapsed-sidebar', function () {
              return view('admin.collapsed-sidebar'); //collapsed-sidebar.blade.php
       });
       Route::get('/calendar', function () {
              return view('admin.calendar'); //calendar.blade.php
       });
});