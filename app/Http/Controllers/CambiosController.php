<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CambiosController extends Controller
{
    public function cambios(){

        $cambios = App\Cambios::all();
        $cuentadante = false;
       // return view ('miscambiosD', ['cambios' => $Cambios ] );
       return view ('Docente.miscambiosD', compact('cambios','cuentadante'));
    }
}
