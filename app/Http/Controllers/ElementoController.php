<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elemento;
use App\Cambios;
use App;
use Illuminate\Support\Facades\DB;

class ElementoController extends Controller
{
    public function IngresarElemento()
    {
        $aula = App\Aula::all()->where('identificacion','=',auth()->user()->identificacion);

        return view ('Docente.IngresarEle',compact('aula'));
    }

    public function IngresarElemento2(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|numeric',
            'aula' => 'required',
            'elemento' => 'required',
        ]);

        $cantidad = $request -> cantidad;

        for($i = 0 ; $i<$cantidad ; $i++) 
        {
            $Registro =  new Elemento();
            $Registro -> Tipo_Elemento = $request -> elemento;
            $Registro -> Estado = 'Normal';
            $Registro -> Id_Aula =  $request -> aula;
    
            $Registro->save();
        }


        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Inserto';
        $Registro2 -> tabla = 'Elementos';

        $Registro2->save();

        return back()->with('mensajed','Se agrego los elementos correctamente al aula');

    }
}
