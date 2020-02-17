<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        $cuentadante = false;

        // return view ('miscambiosD', ['cambios' => $Cambios ] );
        return view ('index', compact('cuentadante'));
    }

    public function cambios($vida = null){

        $cambios = ['modifico','analizo','melapela'];
        $cuentadante = false;
       // return view ('miscambiosD', ['cambios' => $Cambios ] );
       return view ('miscambiosD', compact('cambios','cuentadante','vida'));
    }
        
    
}
