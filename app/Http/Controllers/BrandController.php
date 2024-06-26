<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = [     [
                            'id'=>'1',
                            'name'=>'HP',
                            'logo'=>''
                        ],
                        [   
                            'id'=>'2',
                            'name'=>'Dell',
                            'logo'=>''
                        ]
                  ];//AOA Array of Arrays
        return view('/admin.brands.index',['brands'=>$brands]); //'index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        return view('admin.brands.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //POST method
    {
        //how you can receive the incoming data
        //with $request object
        //dd($request->all());
        $request->validate([
                                'brand_name' => 'required|unique:brands',
                                'brand_logo' => 'required|mimes:jpg,jpeg,png|max:1024|dimensions:width=120,height=80',
                                'seo_meta_title' => 'required',
                                'seo_meta_desc' => 'required'
                          ]);
 
         //file uploading logic
        $file = $request->file('brand_logo');
        $dst ='';
         if($file){
            $path = $file->store('public/brand_images');
            //file is coming
            $filename = basename($path);
            $dst = '/storage/brand_images/'.$filename;
        }                

        //store into brands table
        //elequent
        $data =$request->only('brand_name','brand_logo',"seo_meta_title","seo_meta_desc");
        $data['brand_logo']=$dst;
        Brand::create($data);
        return back()->with('success','brand created successfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
