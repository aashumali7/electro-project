<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('shop')->group(function () {

    Route::get('/cart',function(){
        return view('shop/cart'); //shop/cart.blade.php
    });
    Route::get('/shop-grid',function(){
            return view('shop/shop-grid'); //shop-grid.blade.php
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
