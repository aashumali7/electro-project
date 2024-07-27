<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        $customerReviewCount = DB::table('reviews')
        ->where('product_id',$product->id)
        ->count();
  
        $avearageRating = DB::table('reviews')
        ->where('product_id',$product->id)
        ->avg('rating');
        return view('shop/single-product-fullwidth',[
                                                        'product'=>$product,
                                                        'customerReviewCount'=>$customerReviewCount,
                                                        'avearageRating'=>$avearageRating
                                                    ]);
    }
}
