@extends('layoutA')

@section('contenido')
<div class="container center">
    <h1>Registrar Docente</h1>
<form action="{{ route('IngresarD')}}" method="POST">
    {{ csrf_field() }}
    <div class='row'>
        <div class="col s12 m6">
            <label for="Nombre">Nombres</label>
            <input name="Nombres" type="text" id="Nombre" placeholder="Ingrese sus nombres">
        </div>
        <div class="col s12 m6">
            <label for="Apellido">Apellidos</label>
            <input name="Apellidos" type="text" id="Apellido" placeholder="Ingrese sus apellidos">
        </div>
        <div class="col s12">
            <label for="iden">Identificacion</label>
            <input name="Identificacion" type="text" id="iden" placeholder="Ingresa tu identificacion">
        </div>
        <div class="col s12">
            <label for="Correo">Correo Electronico</label>
            <input name="Correo" type="email" id="Correo" placeholder="Ingresa tu correo electronico">
        </div>
     
        
        <div class="col s12 m6">
            <label for="Contraseña">Contraseña</label>
            <input name="Contraseña" type="password" id="Contraseña" placeholder="Crea una contraseña">
        </div>
        <div class="col s12 m6">
            <label for="Contraseña1">Confirmar Contraseña</label>
            <input name="Contraseña2" type="password" id="Contraseña1" placeholder="Vuelve a escribir la contraseña">
        </div>
        <div class="input-field col m6 s12">
            <select name="Modalidad">
              <option value="" disabled selected>Elije una opcion</option>
              <option value="Analisis y desarrollo de sistemas de informacion">Analisis y desarrollo de sistemas de informacion</option>
              <option value="Programacion de Software">Programacion de Software</option>
              <option value="Gestion de redes">Gestion de redes</option>
              <option value="Desarrollo de app movil">Desarrollo de app movil</option>
            </select>
            <label>Modalidad</label>
          </div>
          <div class="input-field col m6 s12">
            <select name="Cuentadante">
              <option value="" disabled selected>Elije una opcion</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
            <label>Cuentadante</label>
          </div>
          <div class="col s12">
              <button class="btn green darken-2" type="submit">Registrar</button>
          </div>
          @if(session('mensajed'))       
            <h6 class="red-text">{{session('mensajed')}}</h6>       
          @endif
    
    </div>
</form>
</div>
    
@endsection