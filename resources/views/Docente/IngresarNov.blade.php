@extends('layoutD')

@section('contenido')
    
<div class="container center">
    <h1>Ingresar Novedad/Aula</h1>
 <form action="{{ route('IngresarNovedad2')}}" method="POST">
        {{ csrf_field() }}
    <div class="row">
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
            <label>Seleccione el aula al que desea ingresar novedad</label>
        </div>
        <div class="col s12 input-field">
            @error('novedad')
            <span class="red-text" >Este campo es obligatorio es obligatorio/Solo letras</span><br>
            @enderror
            <textarea name="novedad" value="{{old('novedad')}}" type="text" class="materialize-textarea" id="novedad" placeholder="Ingrese la novedad del aula" data-length="100"></textarea>
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