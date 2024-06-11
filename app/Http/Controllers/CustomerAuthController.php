<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerAuthController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
                               'email'=>'required|email|unique:users',
                               'password'=>'required|min:8'
        
                            ]);

        //classObject = new ClassName();
        $userco = new User();
        //set the fields
        // L = R  value assign right to left
        $userco->email = $request->email;
        $userco->password = $request->password;

        $result = $userco->save();
        if($result){
            // True 
            // user registerd done
            return back()->with('Success','you have registerd succesfully');
        }else{
            //False
            // user not stored
            //with() method will create session variable 
            return back()->with('failed');
        }
        //dd($request->all());
        //every function return something
        return "register succesfull";
    }
}
