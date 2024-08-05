<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\Review as ModelsReview;

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
        $product = Product::where('slug',$slug)
        ->join('categories', 'products.category_id', '=', 'categories.category_id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->join('product_gallery_images', 'products.id', '=', 'product_gallery_images.product_id')
        ->select('products.*','categories.category_name','brands.brand_name','brands.brand_logo')
        ->first();
        $customerReviewCount = DB::table('reviews')
        ->where('product_id',$product->id)
        ->count();
  
        $avearageRating = DB::table('reviews')
        ->where('product_id',$product->id)
        ->avg('rating');

        $reviews = Review::where('product_id',$product->id)
        ->where('users.role', '=', 'customer')
        ->join('products','products.id','=','reviews.product_id')
        ->join('users','users.id','=','reviews.customer_id')
        ->select( 'reviews.reviewContent','reviews.rating','reviews.created_at','users.name','users.surname','users.role') 
        ->get();
        
        $product_gallery_images = Product::join('product_gallery_images', 'products.id', '=', 'product_gallery_images.product_id')
        ->get();

        $rating5 = DB::table('reviews')
        ->where('product_id', $product->id)
        ->where('rating', 5)
        ->count();
        $rating4 = DB::table('reviews')
        ->where('product_id', $product->id)
        ->where('rating', 4)
        ->count();
        $rating3 = DB::table('reviews')
        ->where('product_id', $product->id)
        ->where('rating', 3)
        ->count();
        $rating2 = DB::table('reviews')
        ->where('product_id', $product->id)
        ->where('rating', 2)
        ->count();
        $rating1 = DB::table('reviews')
        ->where('product_id', $product->id)
        ->where('rating', 1)
        ->count();

        return view('shop/single-product-fullwidth',[
                                                        'product'=>$product,
                                                        'product_gallery_images'=>$product_gallery_images,
                                                        'customerReviewCount'=>$customerReviewCount,
                                                        'avearageRating'=>$avearageRating,
                                                        'reviews'=>$reviews,
                                                        'rating5'=>$rating5,
                                                        'rating4'=>$rating4,
                                                        'rating3'=>$rating3,
                                                        'rating2'=>$rating2,
                                                        'rating1'=>$rating1
                                                    ]);
    }
}
