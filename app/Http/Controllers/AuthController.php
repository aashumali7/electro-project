<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
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
        
        dd($user);
        dd($request->all());
       
        return'login successfull'; 
    } 
}
