@extends('layoutD')

@section('contenido')
    
<div class="container center">
    <h1>Ingresar Elementos</h1>
 <form action="{{ route('IngresarElemento2')}}" method="POST">
        {{ csrf_field() }}
    <div class="row">
        <div class="col s12">
            @error('elemento')
            <span class="red-text" >Seleccione un elemento</span><br>
            @enderror
            <select name="elemento"  value="{{old('elemento')}}">
              <option value="" disabled selected>Elije una opcion</option>
              <option value="Silla">Silla</option>
              <option value="Computador">Computador</option>
              <option value="TV">TV</option>
              <option value="Armario">Armario</option>
              <option value="Escritorio">Escritorio</option>
            </select>
            <label>Elementos</label>
        </div>
        <div class="col s12">
            @error('cantidad')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo numeros</span><br>
            @enderror
            <input name="cantidad" value="{{old('cantidad')}}" type="text" id="cantidad" placeholder="Ingrese el numero de elementos">
        </div>
        <div class="col s12">
            @error('aula')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="aula"  value="{{old('aula')}}">
              <option disabled selected>Elije el numero de aula</option>
              @foreach ($aula as $item)
              <option value="{{$item->Id_Aula}}">{{$item->Nombre . ' / ' . $item->Numero}}</option>
              @endforeach
            </select>
            <label>Seleccione el aula al que desea ingresar el elemento</label>
        </div>
        <div class="col s12">
            <button class="btn green darken-2" type="submit">Ingresar</button>
       </div>
        @if(session('mensajed'))       
        <h6 class="red-text">{{session('mensajed')}}</h6>       
      @endif
    </div>
 </form>
</div>

@endsection