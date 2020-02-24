@extends('layoutA')

@section('contenido')
    
<div class="container  center">
    <h1>Registrar Aula</h1>
    <form action="{{route('IngresarA')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                @error('Nombres')
                <span class="red-text" >El nombre es obligatorio/Solo letras</span><br>
                @enderror
                <label for="Nombre">Nombres</label>
            <input name="Nombres" value="{{old('Nombres')}}" type="text" id="Nombre" placeholder="Ingrese el nombre del aula">
            </div>
            <div class="col s12">
                @error('Numero')
                <span class="red-text" >El numero del aula es obligatorio/Solo numeros</span><br>
                @enderror
                <label for="Nombre">Numero</label>
            <input name="Numero" value="{{old('Numero')}}" type="text" id="Numero" placeholder="Ingrese el numero del aula">
            </div>
            <div class="col s12">
                @error('Identificacion')
                <span class="red-text" >La identificacion del docente es obligatorio/Solo numeros</span><br>
                @enderror
                <label for="Identificacion">Identificacion Docente</label>
            <input name="Identificacion" value="{{old('Identificacion')}}" type="text" id="Identificacion" placeholder="Ingrese la identificacion del docente">
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