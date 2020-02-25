@extends('layoutD')

@section('contenido')
<div class="container center">
    <h1>Mis Novedades Elementos</h1>
    <table class="bordered striped">
        <thead>
          <tr>
              <th>Aula</th>
              <th>Elemento</th>
              <th>Novedad</th> 
              <th>Estado</th>
              <th>Fecha</th>
              <th>Hora</th>
          </tr>
        </thead>
    
        <tbody>
            
            @foreach ($datos as $item)
            <tr>
            <td>{{$item->Aula . '  / '. $item->Numero_Aula}}</td>
            <td>{{$item->Tipo_Elemento}}</td>
            <td>{{$item->Novedad}}</td>
            <td>{{$item->Estado}}</td>  
            <td>{{$item->fecha}}</td>
            <td>{{$item->hora}}</td>
            </tr> 
            @endforeach
    
        </tbody>
    </table>
</div>
@endsection