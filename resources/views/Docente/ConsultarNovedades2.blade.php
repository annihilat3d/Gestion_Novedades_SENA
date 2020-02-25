@extends('layoutD')

@section('contenido')
<div class="container center">
    <h1>Mis Novedades Aula</h1>
    <table class="bordered striped">
        <thead>
          <tr>
              <th>Aula</th>
              <th>Numero Aula</th>
              <th>Novedad</th> 
              <th>Fecha</th>
              <th>Hora</th>
          </tr>
        </thead>
    
        <tbody>
            
            @foreach ($datos as $item)
            <tr>
            <td>{{$item->Aula}}</td>
            <td>{{$item->Numero_Aula}}</td>
            <td>{{$item->Novedad}}</td>
            <td>{{$item->fecha}}</td>
            <td>{{$item->hora}}</td>
            </tr> 
            @endforeach
    
        </tbody>
    </table>
</div>
@endsection