<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CambiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cambios(){

        $cambios = App\Cambios::all()->where('identificacion','=',auth()->user()->identificacion);

        $cargo = auth()->user()->cargo;  
        
        if($cargo == 'Administrador')
        {

            return view ('Administrador.miscambiosA', compact('cambios'));
        }
        else
        {
            return view ('Docente.miscambiosD', compact('cambios'));
        }
          
    }
    
}
