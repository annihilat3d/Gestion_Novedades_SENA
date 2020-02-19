<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
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
        $Registro = new Docente();
        $Name = $request ->Nombres;
        $Registro -> Nombres = $request ->Nombres;
        $Name2 = $request ->Apellidos;
        $Registro -> Apellidos = $request ->Apellidos;
        $Email = $request ->Correo;
        $Registro -> Correo = $request ->Correo;
        $Registro -> IdentificacionDoc = $request ->Identificacion;
        $Password = $request ->password;
        $Registro -> Contraseña = bcrypt($request ->password);
        $Registro -> Modalidad = $request ->Modalidad;
        $Registro -> Cuentadante = $request ->Cuentadante;

        $Registro->save();

        



        $Registro2= new User();
        $Registro2 -> name = $Name;
        $Registro2 -> name2 = $Name2;
        $Registro2 -> email = $Email;
        $Registro2 -> password = bcrypt($Password);
        $Registro2->save();


        return back()->with('mensajed','Se agrego el docente correctamente');

    }

    public function ValidarRegistro(Request $request)
    {
       
    }
}
