<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //1. property

    //2. constructor

    //3. method
    public function home(){
        $categories = Category::whereNotNull('rank')->orderBy('rank', 'asc')->get();
        return view('home',['categories'=>$categories]); //home.blade.php
    }

    public function show($slug){
        //dd($slug);
        $product = Product::where('slug',$slug)->first();
        return view('shop/single-product-fullwidth',['product'=>$product]);
    }
}
