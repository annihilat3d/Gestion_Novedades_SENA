<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Cambios;
use App\Elemento;
use App;
use Illuminate\Support\Facades\DB;


class NovedadController extends Controller
{
    public function IngresarNovedad()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $aula = App\Aula::all()->where('identificacion','=',auth()->user()->identificacion);

        return view ('Docente.IngresarNov',compact('aula'));
    }

    public function IngresarNovedad2(Request $request)
    {
        $request->validate([
            'aula' => 'required',
            'novedad' => 'required|string',
        ]);

        $Registro =  new Novedad();
        $Registro -> Novedad = $request -> novedad;
        $Registro -> Id_Aula =  $request -> aula;
    
        $Registro->save();


        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Inserto';
        $Registro2 -> tabla = 'Novedad/Aula';

        $Registro2->save();

        return back()->with('mensajed','Se agrego la Novedad correctamente al aula');

    }
    public function IngresarNovedad3()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $aula = App\Aula::all()->where('identificacion','=',auth()->user()->identificacion);
        
        //$elemento = App\Elemento::all()->where('Id_Aula','=',$id);
        return view ('Docente.IngresarNov2',compact('aula'));
    }

    public function IngresarNovedad4(Request $request)
    {
        $request->validate([
            'elemento' => 'required',
            'novedad' => 'required|string',
            'estado' => 'required',
        ]);

        $Registro =  new Novedad();
        $Registro -> Novedad = $request -> novedad;
        $Registro -> Estado =  $request -> estado;
        $Estado = $request -> estado;
        $Registro -> Id_Elemento =  $request -> elemento;

        $Registro->save();

        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Inserto';
        $Registro2 -> tabla = 'Novedad/Elemento';

        $Registro2->save();

    
        if ($Estado == 'Por arreglar')
        {
            $affected = DB::table('Elemento')
            ->where('Id_Elemento','=',  $request -> elemento)
            ->update(['Estado' => 'Por arreglar' ]);  
            return back()->with('mensajed','Se agrego la Novedad correctamente al elemento');  
        }
        else if ($Estado == 'Ingreso')
        {
            $affected = DB::table('Elemento')
            ->where('Id_Elemento','=',  $request -> elemento)
            ->update(['Estado' => 'Normal' ]);   
            return back()->with('mensajed','Se agrego la Novedad correctamente al elemento');
        }
        else
        {
            $affected = DB::table('Elemento')
            ->where('Id_Elemento','=', $request -> elemento)
            ->update(['Estado' => 'Salida' ]);    
            return back()->with('mensajed','Se agrego la Novedad correctamente al elemento');
        }

 


        return back()->with('mensajed','Se agrego la Novedad correctamente al elemento');

    }

    public function SeleccionarArea($area)
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $id = $area;
        $elemento = DB::select("Select * from Elemento 
        where Id_Aula = ? and Estado != 'Inactivo'",[$id]);
        //$elemento = App\Elemento::all()->where('Id_Aula','=',$id);
        return view('Docente.IngresarNov3',compact('id','elemento'));

    }

    public function ConsultarNovedades()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Consulto';
        $Registro2 -> tabla = 'Novedad/Elemento';

        $Registro2->save();

        $datos = DB::select('Select D.identificacion,D.nombres, D.apellidos, A.Nombre as Aula, A.Numero as Numero_Aula, E.Tipo_Elemento, N.Novedad, N.Estado, N.fecha, N.hora from users as D
        inner join Aula as A on D.identificacion = A.identificacion
        inner join Elemento as E on A.Id_Aula = E.Id_Aula
        inner join Novedad as N on N.Id_Elemento = E.Id_Elemento where D.identificacion = ?',[auth()->user()->identificacion]);

        return view('Docente.ConsultarNovedades',compact('datos'));
    }
    public function ConsultarNovedades2()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Administrador')
        {
            return view ('Administrador.index');
        }
        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Consulto';
        $Registro2 -> tabla = 'Novedad/Aula';

        $Registro2->save();

        $datos = DB::select('Select D.identificacion,D.nombres, D.apellidos, A.Nombre as Aula, A.Numero as Numero_Aula, N.Novedad, N.fecha, N.hora from users as D
        inner join Aula as A on D.identificacion = A.identificacion
        inner join Novedad as N on N.Id_Aula = A.Id_Aula where D.identificacion = ?',[auth()->user()->identificacion]);

        return view('Docente.ConsultarNovedades2',compact('datos'));
    }
}
