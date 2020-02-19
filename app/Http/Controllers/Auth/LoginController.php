<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use Auth;

class LoginController extends Controller
{

  

    public function __construct()
    {
        $this->middleware('guest',['only' => 'ShowLoginForm']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
        
    }


    public function login()
    {
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);


        if(Auth::attempt($credentials))
        {
            return redirect ()->route('indexD');

        }
        
    
        return back()
        ->withErrors(['email' => trans('auth.failed')])
        ->withInput(request(['email'])) ;
       


    }
  
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

   
}
