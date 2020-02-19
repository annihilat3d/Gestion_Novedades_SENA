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
        $cuentadante = false;
    

        // return view ('miscambiosD', ['cambios' => $Cambios ] );
        return view ('Docente.index', compact('cuentadante'));
    }


        
    
}
