@extends('layoutA')

@section('contenido')

<div class="container center">
    <h1>Actualizar/Consultar Docente</h1>
<form action="{{ route('AsignarAula')}}" method="POST">
    {{ csrf_field() }}
    <div class='row'>
        <h6>Ingresa la identificacion del docente</h6>
        <div class="col s12">
            @error('identificacion')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo letras</span><br>
            @enderror
            <input name="identificacion" value="{{old('identificacion')}}" type="text" id="Campo" placeholder="Ingresa la identificacion del docente">
        </div>
        <div class="col s12">
            @error('aula')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="aula"  value="{{old('aula')}}">
              <option disabled selected>Elije el numero de aula que deseas asignar</option>
              @foreach ($aula as $item)
              <option value="{{$item->Id_Aula}}">{{$item->Nombre . ' / ' . $item->Numero}}</option>
              @endforeach
            </select>
            <label>Seleccione el aula a asignar</label>
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