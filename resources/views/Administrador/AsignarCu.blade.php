@extends('layoutA')

@section('contenido')

<div class="container center">
    <h1>Asignar cuentadante</h1>
<form action="{{ route('AsignarCuentadante')}}" method="POST">
    {{ csrf_field() }}
    <div class='row'>
        <h6>ingrese la identificacion del docente</h6>
        <div class="col s12">
            @error('identificacion')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo numeros</span><br>
            @enderror
            <input name="identificacion" value="{{old('identificacion')}}" type="text" id="Campo" placeholder="Ingrese el numero de identificacion del docente">
            <label for="Campo">Cuentadante</label>
        </div>
         <div class="col s12">
            @error('aula')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="aula"  value="{{old('aula')}}">
              <option value="" disabled selected>Elije una opcion</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
            <label>Cuentadante</label>
        </div>
        <div class="col s12">
            <button class="btn green darken-2" type="submit">Asignar</button>
       </div>
        @if(session('mensajed'))       
        <h6 class="red-text">{{session('mensajed')}}</h6>       
      @endif
</form>
</div>
    
@endsection