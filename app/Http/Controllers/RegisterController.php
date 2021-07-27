<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //

    public function register()
    {
        return view('Register.register');
    }

    public function register_store(Request $request)
    {
       $attributes=$request->validate([
           'name'=>'required|min:7|max:255',
           'username'=>'required|min:7|max:255|unique:users,username',
           'email'=>'required|email|max:255|unique:users,email',
           'password'=>'required|min:7|max:255',
       ]);

       
    $attributes['password']=bcrypt($attributes['password']);


     $user= User::create($attributes);
     auth()->login($user);
     
      return redirect('/')->with('success','your account is successfully created');
        
    }

    public function user_logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye!');
    }

    public function login()
    {
        return view('Register.login');
    }

    public function login_attempt(Request $request)
    {
        $att=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($att))
        {
            return redirect('/')->with('success','login successfully');
        }

        return back()->withErrors(['email'=>'your provided credentials could not be verified']); 


    }
}
