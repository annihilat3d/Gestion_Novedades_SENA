<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Docente;

class AdministradorController extends Controller
{
    public function indexA(){

 
        return view ('Administrador.index');
    }

    public function RegistrarD(){

        return view ('Administrador.DRegistrar');
    }

    public function IngresarD(Request $request)
    {
        //return $request->all();
        $Registro = new Docente();
        $Registro -> Nombres = $request ->Nombres;
        $Registro -> Apellidos = $request ->Apellidos;
        $Registro -> Correo = $request ->Correo;
        $Registro -> IdentificacionDoc = $request ->Identificacion;
        $Registro -> Contraseña = $request ->Contraseña;
        $Registro -> Modalidad = $request ->Modalidad;
        $Registro -> Cuentadante = $request ->Cuentadante;

        $Registro->save();

        return back()->with('mensajed','Se agrego el docente correctamente');

    }
}
