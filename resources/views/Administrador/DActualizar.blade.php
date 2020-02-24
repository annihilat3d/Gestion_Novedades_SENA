@extends('layoutA')

@section('contenido')

<div class="container center">
    <h1>Actualizar/Consultar Docente</h1>
<form action="{{ route('FiltrarDoc')}}" method="POST">
    {{ csrf_field() }}
    <div class='row'>
        <h6>Consulta el docente y despues actualiza sus datos</h6>
        <div class="col s12">
            @error('Filtro')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="Filtro"  value="{{old('Filtro')}}">
              <option value="" disabled selected>Elije un filtro</option>
              <option value="Correo">Correo</option>
              <option value="Identificacion">Identificacion</option>
              <option value="Id">Id</option>
            </select>
            <label>Filtrar por:</label>
        </div>
        <div class="col s12">
            @error('Campo')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo letras</span><br>
            @enderror
            <input name="Campo" value="{{old('Campo')}}" type="text" id="Campo" placeholder="Ingrese el dato a filtrar">
        </div>
        <div class="col s12">
             <button class="btn green darken-2" type="submit">Consultar</button>
        </div>
        @if(session('mensajed'))       
        <h6 class="red-text">{{session('mensajed')}}</h6>       
      @endif
</form>
</div>
    
@endsection