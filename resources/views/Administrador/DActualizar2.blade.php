
@extends('layoutA')

@section('contenido')
<div class="container center">
    <div class="row">
    <h1>Actualizar/Consultar Docente</h1>
    <h4>{{$Datos ->nombres . ' ' . $Datos ->apellidos }}</h4>
    <form action="{{route('ActualizarDoc')}}" method="POST">
    {{ csrf_field() }}

<div class="col s12 m6">
    @error('Nombres')
    <span class="red-text" >El nombre es obligatorio/Solo letras</span><br>
    @enderror
    <label for="Nombre">Nombres</label>
<input name="Nombres" value="{{$Datos ->nombres}}" type="text" id="Nombre" placeholder="Ingrese sus nombres">
</div>
<div class="col s12 m6">
    @error('Apellidos')
    <span class="red-text" >El apellido es obligatorio/Solo letras</span><br>
    @enderror
    <label for="Apellido">Apellidos</label>
    <input name="Apellidos"  value="{{$Datos ->apellidos}}" type="text" id="Apellido" placeholder="Ingrese sus apellidos">
</div>
<div class="col s12">
    @error('Identificacion')
    <span class="red-text" >La identificacion es obligatioria/Solo numeros</span><br>
    @enderror
    <label for="iden">Identificacion</label>
    <input name="Identificacion"   value="{{$Datos ->identificacion}}" type="text" id="iden" placeholder="Ingresa tu identificacion">
</div>
<div class="col s12">
    @error('Correo')
    <span class="red-text" >El correo es obligatorio</span><br>
    @enderror
    <label for="Correo">Correo Electronico</label>
    <input name="Correo"  value="{{$Datos ->email}}" type="email" id="Correo" placeholder="Ingresa tu correo electronico">
</div>

<div class="col s12 m6">

    <label for="Contraseña">Contraseña</label>
    <input disabled name="password"  value="{{($Datos ->password)}}"  type="password" id="Contraseña" placeholder="Crea una contraseña">
</div>
<div class="col s12 m6">    
    <label for="Contraseña1">Confirmar Contraseña</label>
    <input disabled name="password_confirmation" type="password" value="{{($Datos ->password)}}" id="Contraseña1" placeholder="Vuelve a escribir la contraseña">
</div>
<div class="input-field col m6 s12">
    @error('Modalidad')
    <span class="red-text" >Seleccione una opcion</span><br>
    @enderror
 
    <span>   {{$Datos ->modalidad}}</span><br>
    <select name="Modalidad">
      <option value="" disabled selected>Elije una opcion</option>
      <option value="Analisis y desarrollo de sistemas de informacion">Analisis y desarrollo de sistemas de informacion</option>
      <option value="Programacion de Software" >Programacion de Software</option>
      <option value="Gestion de redes">Gestion de redes</option>
      <option value="Desarrollo de app movil">Desarrollo de app movil</option>
    </select>
    <label>Modalidad</label>
  </div>
  <div class="input-field col m6 s12">
    @error('Cuentadante')
    <span class="red-text" >Seleccione una opcion</span><br>
    @enderror
    <span>{{$Datos ->cuentadante}}</span><br>
    <select name="Cuentadante">
      <option value="" disabled selected>Elije una opcion</option>
      <option value="Si">Si</option>
      <option value="No">No</option>
    </select>
    <label>Cuentadante</label>
  </div>
  <div class="col s6">
      <button class="btn green darken-2" name='Envio' value='Actualizar' type="submit">Actualizar</button>
  </div>
  <div class="col s6">
    <button class="btn green darken-2" name='Envio' value='Eliminar' type="submit">Eliminar</button>
</div>
<h6 class="red-text">Al eliminar docente se cambiara de estado a inactivo este mismo, pero sus datos se mantendran en la base de datos</h6>

</div>
</div>
</form>

@endsection