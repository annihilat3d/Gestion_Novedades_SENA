@extends('layoutD')

@section('contenido')
<form action="{{ route('IngresarNovedad4')}}" method="POST">
    {{ csrf_field() }}
    <div class="container center">
    <h1>Ingresar Novedad/Elemento</h1>
    <div class="row">
        <div class="col s12">
            @error('elemento')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="elemento"  value="{{old('elemento')}}">
              <option disabled selected>Elije el elemento</option>
              @foreach ($elemento as $item2)
              <option value="{{$item2->Id_Elemento}}">Id: {{$item2->Id_Elemento . ' / ' . $item2->Tipo_Elemento}}</option>
              @endforeach
            </select>
        </div>
        <div class="col s12 input-field">
            @error('novedad')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo letras</span><br>
            @enderror
            <textarea name="novedad" value="{{old('novedad')}}" type="text" class="materialize-textarea" id="novedad" placeholder="Ingrese la novedad del aula" data-length="100"></textarea>
        </div> 
        <div class="col s12">
            @error('estado')
            <span class="red-text" >Seleccione una opcion</span><br>
            @enderror
            <select name="estado"  value="{{old('estado')}}">
              <option disabled selected>Elije el estado del elemento</option>
              <option value="Por arreglar">Por arreglar</option>
              <option value="Ingreso">Ingreso</option>
              <option value="Salida">Salida</option>
            </select>
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