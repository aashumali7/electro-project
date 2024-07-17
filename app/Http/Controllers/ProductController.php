<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //1. querybuilder
        //2. elequent ORM (object relation mapper)
        $products = Product::all();

        $products = Product
        ::join('brands', 'products.brand_id', '=','brands.id')
        ->join('units','products.unit_id', '=','units.id')
        ->join('categories','products.category_id', '=','categories.category_id')
        ->select('products.id as product_id','products.*','brands.*','units.*','categories.*')
        ->get();
        return view('admin.products.index',['products' => $products]);
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

        //1.client side validation
        //2. server side validation
        //3. store data in database
        //4. redirect to the product list page

        //1. client side validation
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'unit_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'mrp' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'qty_available' => 'required|integer',
            'prod_thumbnail_img' => 'required|mimes:jpeg,png,jpg|max:2048|dimensions:width=212,height=200',
            'prod_main_img' => 'required|mimes:jpeg,png,jpg|max:2048|dimensions:width=720,height=660',
            ]);

        //2. server side validation
        //check if
         
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
        return back()->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //ClassObject->property
        //dd($product->product_name);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $units = Unit::all();
    
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories,'units' => $units,'brands' => $brands]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        //return 'update';
        $product->update([
            'product_name' => $request->product_name,
            'product_desc' => $request->product_desc,
            'unit_id' => $request->unit_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'mrp' => $request->mrp,
            'sell_price' => $request->sell_price,
            'qty_available' => $request->qty_available

        ]);
        return back()->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $prod_thumbnail_img_filename = basename($product->prod_thumbnail_img);

        // Define the storage path for the logo
        $thumbnail_storagePath = 'public/prod_img/' . $prod_thumbnail_img_filename;
        //dd($storagePath);

        // Check if the file exists and delete it
        if (Storage::exists( $thumbnail_storagePath)) {
            Storage::delete( $thumbnail_storagePath);
        }

        $prod_main_img_filename = basename($product->prod_main_img);

        // Define the storage path for the logo
        $main_storagePath = 'public/prod_img/' . $prod_main_img_filename;
        //dd($storagePath);

        // Check if the file exists and delete it
        if (Storage::exists( $main_storagePath)) {
            Storage::delete( $main_storagePath);
        }
        $product->delete();
        return back()->with('success','Product deleted successfully');
    }
}
