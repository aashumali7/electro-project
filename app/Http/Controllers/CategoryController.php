<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.category.index');// admin/category/index.blade.php
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
        //ClassName::method()
        Category::create();
        $data = $request->only('category_name','description');
        return redirect('admin/category/create');
        // I want to store incoming data to categories table
        
        //dd($request->all());
        //1.QueryBuilder
        //2. Elequent ORM 
        return 'store';
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
        //
    }
}
