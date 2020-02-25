<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elemento;
use App\Cambios;
use App;
use Illuminate\Support\Facades\DB;

class ElementoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function IngresarElemento()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
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
    public function ConsultarElementos()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Consulto';
        $Registro2 -> tabla = 'Elementos';

        $Registro2->save();


        $datos = DB::select("Select D.identificacion,D.nombres, D.apellidos,A.Nombre as Aula, A.Numero, E.Id_Elemento, E.Tipo_Elemento, E.Estado from users as D
        inner join Aula as A on D.identificacion = A.identificacion
        inner join Elemento as E on A.Id_Aula = E.Id_Aula where D.identificacion = ? and E.Estado != 'Inactivo'",[auth()->user()->identificacion]);

        return view('Docente.ConsultarElementos',compact('datos'));
    }
    public function QuitarElementos2()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $aula = App\Aula::all()->where('identificacion','=',auth()->user()->identificacion);
        
        //$elemento = App\Elemento::all()->where('Id_Aula','=',$id);
        return view ('Docente.QuitarElementos2',compact('aula'));
    }
    public function QuitarElementos($area)
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $id = $area;
        $elemento = App\Elemento::all()->where('Id_Aula','=',$id);
        return view('Docente.QuitarElementos',compact('id','elemento'));
    }
    public function QuitarElementos3(Request $request)
    { 
        $request->validate([
            'elemento' => 'required',
        ]);
       
        $elemento = $request -> elemento;
        
        $affected = DB::table('Elemento')
        ->where('Id_Elemento','=', $elemento)
        ->update(['Estado' => 'Inactivo' ]);

        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Elimino';
        $Registro2 -> tabla = 'Elemento';

        $Registro2->save();

    
        return back()->with('mensajed','Se elimino correctamente el elemento del aula');

    }
}
