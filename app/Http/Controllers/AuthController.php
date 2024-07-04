<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //1.Property
    
    //2.Constructor
    
    //3.Method
    public function dashboard(Request $request){
        //brands
        $brands = \App\Models\Brand::all();
        //categories
        $categories = \App\Models\Category::all();
        //units
        $units = \App\Models\Unit::all();
        //products
        $product = \App\Models\Product::all();

        return view('admin.dashboard',[
                                            'categories'=>count($categories),
                                            'brands'=>count($brands),
                                            'units'=>count($units),
                                            'products'=>count($product)
                                      ]);
    
        
    }
    public function login(Request $request){
        //Serverside validation
        //1.validate our incoming data 
        $request->validate([
                              'email'=>'required|email:users',
                              'password'=>'required|min:8|max:20'
                          ]);
                          
        //2. check with users table if email exists or not 
        //1.QueryBuilder
        //2.Elequent ORM 
        //ClassName::methodName(actualarg1,actualarg2)
        $user = User::where('email','=',$request->email)->first();
        $credentials =$request->only('email','password');
         
        //check if the user object is not empty 
        if($user){
            if(Auth::attempt($credentials)){
                session(['firstname'=>$user->name]); //associative array ['key'=>'value']
                session(['lastname'=>$user->surname]);
                return redirect('/admin/dashboard');

            }else{
                //empty invalid credentials
                //dd(' invalid credentials user does not exists');

            //every function return something
            return back()->with('failed','Invalid Credentials');

            }
            //try auth attempt
            //not empty
            //dd('user exits');
            //store user information on session variables
            
        }else{
              //every function return something
              return back()->with('failed','Invalid Credentials');
        }
        //dd($user->name);
        //dd($request->all());
       
        return'login successfull'; 
    } 

    public function logout(Request $request){
        $request->session()->flush();
          
        //every function return something
        return redirect('/admin');
    }

}
