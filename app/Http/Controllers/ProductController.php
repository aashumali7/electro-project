<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get brand
        $brands = Brand::all();
        //get categories
        $categories  = Category::all();
        //get units
        $units = Unit::all();
        return view('admin.products.create',['brands'=>$brands,'categories'=>$categories,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
         
        $data = $request->only('product_name','product_desc','unit_id','brand_id','category_id','mrp','sell_price','qty_available');

        //upload product image
        $prod_thumbnail_img = $request->file('prod_thumbnail_img');
        $prod_thumbnail_img_dst ='';
        if($prod_thumbnail_img){
            $path = $prod_thumbnail_img->store('public/prod_img');
            //file is coming
            $filename = basename($path);
           $prod_thumbnail_img_dst = '/storage/prod_img/'.$filename;
        }

         //upload product main image
         $prod_main_img = $request->file('prod_main_img');
         $prod_main_img_dst ='';
         if($prod_main_img){
             $path = $prod_main_img->store('public/prod_img');
             //file is coming
             $filename = basename($path);
             $prod_main_img_dst = '/storage/prod_img/'.$filename;
         }
        $data['prod_thumbnail_img'] =$prod_thumbnail_img_dst;
        $data['prod_main_img'] =$prod_main_img_dst;

        Product::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
