<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    //1. property

    //2. constructor

    //3. method

    public function filter(){

        $brands = DB::table('brands')
        ->leftJoin('products', 'brands.id', '=', 'products.brands_id')
        // ->select('brands.*',DB::raw('COUNT(products.id) as products_count'))
        // ->groupBy('brands.id')
        ->get();
        return view ('shop/shop-grid',['brands',$brands]);
    }
}
