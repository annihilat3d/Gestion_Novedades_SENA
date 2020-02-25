<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Cambios;
use App\Aula;
use App;



class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexA(){
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        return view ('Administrador.index');
    }

    public function RegistrarD(){
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        return view ('Administrador.DRegistrar');
    }

    public function IngresarD(Request $request)
    {

        $request->validate([
            'Nombres' => 'required|string',
            'Apellidos' => 'required|string',
            'Correo' => 'email|required|string',
            'Identificacion' => 'required|numeric',
            'password' => 'required|confirmed',
            'Modalidad' => 'required|string',
            'Cuentadante' => 'required|string'

        ]);

        //return $request->all();
        $Registro = new User();
        $Registro -> nombres = $request ->Nombres;
        $Registro -> apellidos = $request ->Apellidos;
        $Registro -> email = $request ->Correo;
        $Registro -> identificacion = $request ->Identificacion;
        $Registro -> password = bcrypt($request ->password);
        $Registro -> modalidad = $request ->Modalidad;
        $Registro -> cuentadante = $request ->Cuentadante;
        $Registro -> cargo = 'Docente';
        $Registro -> estado = 'Activo';

        $Registro->save();

        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Inserto';
        $Registro2 -> tabla = 'Docente';

        $Registro2->save();

        return back()->with('mensajed','Se agrego el docente correctamente');

    }

    public function ActualizarD()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        return view ('Administrador.DActualizar');
    }

    public function TodosD()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        $datos = App\User::all()->where('cargo','!=','Administrador');

        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Consulto';
        $Registro2 -> tabla = 'Docentes';

        $Registro2->save();

        return view ('Administrador.TodosD',compact('datos'));
    }


    public function ActualizarDoc(Request $request)
    {
        $request->validate([
            'Nombres' => 'required|string',
            'Apellidos' => 'required|string',   
            'Correo' => 'email|required|string',
            'Identificacion' => 'required|numeric',
            'password' => 'required|confirmed',
            'Modalidad' => 'required|string',
            'Cuentadante' => 'required|string',
 
        ]);

        $Nombres = $request ->Nombres;
        $Apellidos = $request ->Apellidos;
        $Correo = $request ->Correo;
        $Identificacion = $request ->Identificacion;
        $password = $request ->password;
        $Modalidad = $request ->Modalidad;
        $Cuentadante = $request ->Cuentadante;
        
        $affected = DB::table('users')
              ->where('identificacion', $Identificacion)
              ->update(['nombres' => $Nombres]);

              
        return 's';

    }

  
    public function AsignarCu()
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        

    
        return view('Administrador.AsignarCu');
    }

    public function Asignar2(Request $request)
    {
        $request->validate([
            'identificacion' => 'required|numeric',
            'aula' => 'required|string',
        ]);

        $identificacion = $request -> identificacion; 
        $cuentadante = $request -> aula;
        $affected = DB::table('users')
        ->where('identificacion','=', $identificacion)
        ->update(['cuentadante' => $cuentadante ]);

        $Registro2 =  new Cambios();
        $Registro2 -> identificacion = auth()->user()->identificacion;
        $Registro2 -> accion = 'Asigno Cuentadante';
        $Registro2 -> tabla = 'Docente';
    
         $Registro2->save();
    
        return back()->with('mensajed','Se cambio de cuentadante correctamente');
    }

    public function FiltrarDoc(Request $request)
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        $request->validate([
            'Filtro' => 'required|string',
            'Campo' => 'required|string',
        ]);

        $Filtro = $request ->Filtro;
        $Campo = $request ->Campo;

        if($Filtro == 'Identificacion')
        {
            $Datos = DB::table('users')->where('identificacion','=',$Campo)->get()->first();
            $Registro2 =  new Cambios();
            $Registro2 -> identificacion = auth()->user()->identificacion;
            $Registro2 -> accion = 'Consulto';
            $Registro2 -> tabla = 'Docente';
    
            $Registro2->save();
            return view('Administrador.DActualizar2',compact('Datos'));
        }
        elseif($Filtro == 'Correo')
        {
            $Datos = DB::table('users')->where('email','=',$Campo)->get()->first();
            $Registro2 =  new Cambios();
            $Registro2 -> identificacion = auth()->user()->identificacion;
            $Registro2 -> accion = 'Consulto';
            $Registro2 -> tabla = 'Docente';
    
            $Registro2->save();
            return view('Administrador.DActualizar2',compact('Datos'));
        }
        else
        {
            $Datos = DB::table('users')->where('id','=',$Campo)->get()->first();
            $Registro2 =  new Cambios();
            $Registro2 -> identificacion = auth()->user()->identificacion;
            $Registro2 -> accion = 'Consulto';
            $Registro2 -> tabla = 'Docente';
    
            $Registro2->save();
            return view('Administrador.DActualizar2',compact('Datos'));
        }


    }

    public function EditarDoc($id)
    {
        $cargo = auth()->user()->cargo;  

        if($cargo == 'Docente')
        {
            return view ('Docente.index');
        }
        $user = App\User::findOrFail($id);

        return view ('Administrador.EditarDoc',compact('user'));

    }

}
