<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function indexD(){
   

        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        else
        {
            return view ('Docente.index');
        }


 
    }


        
    
}
