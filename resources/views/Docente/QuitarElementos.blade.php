@extends('layoutD')

@section('contenido')

<div class="container center">
    <h1>Quitar elementos</h1>
<form action="{{route('QuitarElementos3')}}" method="POST">
        {{ csrf_field() }}
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
            <div class="col s12">
                <button class="btn green darken-2" type="submit">Quitar</button>
           </div>
            @if(session('mensajed'))       
            <h6 class="red-text">{{session('mensajed')}}</h6>       
          @endif
        </div>
    </form>
</div>
    
@endsection