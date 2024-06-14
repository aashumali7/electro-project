<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = User::where('email','=',$request->email)->first();
        //return $user;
        $credentials = $request->only('email','password');
        //Check if the user object is not empty
        if($user){
            if (Auth::attempt($credentials)) {
                session(['firstname' => $user->name]);//Associative array ['key'=>'value']
                session(['lastname' => $user->surname]);
                return response()->json([
                                            'success' => 'You have logged successfully.',
                                            'data'=>[
                                                        'firstname'=>$user->name,
                                                        'lastname' => $user->surname
                                                    ]
                                        ]);
            }else{
                return response()->json(['failed' => 'Invalid credentials'],403);
            }
        }else{
            return response()->json(['failed' => 'Invalid credentials'],403);
       
        }
    }
}
