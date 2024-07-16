<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//Class ChildClass extends Parent{}
//single Inheritance
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get category from db and pass the category to view
        //1.querybuilder
        //2.elequent ORM (object relation mapper)
        $categories = Category::all();
        //dd($categories);

        return view('admin.category.index',['categories'=>$categories]);// admin/category/index.blade.php
        //return "index";
    }

    /**
     * Show the form for creating a new resource.
     * Show the form for creating a new category.
     */
    public function create()
    {
        //
        return view('admin.category.create'); // create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                              'category_name'=>'required|unique:categories',
                              'description'=>'',
                              'cat_image'=>'mimes:jpg,jpeg,png|max:1024'
                           ]);//associative array
        //dd($request->file('cat_image'));
        $file = $request->file('cat_image');
        $dst ='';
        if($file){
            $path = $file->store('public/cat_images');
            //file is coming
            $filename = basename($path);
            $dst = '/storage/cat_images/'.$filename;
        }

        //ClassName::method()
        $data = $request->only('category_name','description');
        $data['picture']=$dst;
        //dd($data);
        
        Category::create( $data);
        // I want to store incoming data to categories table
        
        //dd($request->all());
        //1.QueryBuilder
        //2. Elequent ORM 
        return back()->with('success','Category created successfully');
        //return redirect('admin/category/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $filename = basename($category->picture);

        // Define the storage path for the logo
        $storagePath = 'public/cat_images/' . $filename;
        //dd($storagePath);

        // Check if the file exists and delete it
        if (Storage::exists($storagePath)) {
            Storage::delete($storagePath);
        }
        $category->delete();

        return back()->with('success','Category deleted successfully');

    }
}
