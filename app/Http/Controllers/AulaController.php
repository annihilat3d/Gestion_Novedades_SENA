<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aula;
use App\Cambios;
use App;
use Illuminate\Support\Facades\DB;

class AulaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        return view('Administrador.ARegistrar');
    }

    public function IngresarA(Request $request)
    {
        $request->validate([
            'Nombres' => 'required|string',
            'Numero' => 'required|numeric',
            'Identificacion' => 'required|numeric'      
        ]);

 
        $Registro = new Aula();
        $Registro -> Nombre = $request ->Nombres;
        $Registro -> Numero = $request ->Numero;
        $Registro -> identificacion = $request ->Identificacion;

        $Registro->save();


        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Inserto';
        $Registro2 -> tabla = 'Aula';

        $Registro2->save();


        return back()->with('mensajed','Se agrego el aula correctamente');

    }
    public function Asignar()
    {
       $aula = App\Aula::all();
  
      return view('Administrador.AsignarC',compact('aula'));
    }

    public function AsignarDoc(Request $request)
    {

        $request->validate([
            'identificacion' => 'required|numeric',
            'aula' => 'required',
        ]);
    
        $identificacion = $request -> identificacion; 
        $aula = $request -> aula;
        $affected = DB::table('Aula')
        ->where('Id_Aula','=', $aula)
        ->update(['identificacion' => $identificacion ]);
    
        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Asigno aula';
        $Registro2 -> tabla = 'Docente';
    
        $Registro2->save();
    
        return back()->with('mensajed','Se asigno el aula correctamente');
    }

    public function ConsultarAulas()
    {

        $cargo = auth()->user()->cargo;  
        
        if($cargo == 'Administrador')
        {

            $aula = App\Aula::all();

            return view('Administrador.ConsultarAulas',compact('aula'));
        }
        else
        {
            $aula = App\Aula::all()->where('identificacion','=',auth()->user()->identificacion);

            return view('Docente.ConsultarAulas',compact('aula'));
        }
          

     

    }

}
