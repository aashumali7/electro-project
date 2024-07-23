<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    //


    //3. Method
   
    public function filter(){
        $products = DB::table('products')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.category_id')
        ->get();

        $brands = DB::table('products')
        ->select('brands.brand_name', DB::raw('COUNT(*) as productCount'))
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->groupBy('products.brand_id', 'brands.brand_name')
        ->get();
        return view('shop/shop-grid',[
                                        'brands'=>$brands,
                                        'products'=>$products
                                     ]);
    }
}