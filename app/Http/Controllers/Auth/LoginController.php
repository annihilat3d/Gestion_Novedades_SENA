<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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


    public function login(Request $Request)
    {
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);


        if(Auth::attempt($credentials))
        {
            $correo = $Request -> email;
            $password = $Request -> password;
            $cargo = auth()->user()->cargo;        
            
            
            if ($cargo == 'Administrador')
            {
                return redirect()->action('AdministradorController@indexA');                                   
            }
            else
            {
                return redirect ()->route('indexD');
            }           
        }
        else
        {
            
            return back()
                    ->withErrors(['email' => trans('auth.failed')])
                    ->withInput(request(['email'])) ;      
        }
    }
  
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

   
}
