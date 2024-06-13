<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerAuthController extends Controller
{
    //
    //1. property

    //2. constructor

    //3.method many 
    public function register(Request $request){
        //dd($request->all());
        $request->validate([
                               'email'=>'required|email|unique:users',
                               'password'=>'required|min:8'
        
                            ]);

        //classObject = new ClassName();
        $userco = new User();
        //set the fields
        // L = R  value assign right to left
        $userco->name = $request->fname;
        $userco->surname = $request->lname;
        $userco->email = $request->email;
        $userco->password = $request->password;

        $result = $userco->save();
        if($result){
            // True 
            // user registerd done
            return back()->with('success', 'You have registered successfully');
        }else{
            //False
            // user not stored
            //with() method will create session variable 
            return back()->with('failed', 'Registration failed, please try again');
        }
        //dd($request->all());
        //every function return something
        return "register succesfull";
    }

    public function login(Request $request){
        dd($request->all());
        //every function return something
        return "login";
    }
}
