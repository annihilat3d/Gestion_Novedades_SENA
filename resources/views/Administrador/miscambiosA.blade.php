@extends('layoutA')

@section('contenido')
<h1 class="center">Mis Cambios</h1>
<table class="bordered striped">
    <thead>
      <tr>
          <th>Id</th>
          <th>Accion</th>
          <th>Tabla</th> 
          <th>Fecha</th>
          <th>Hora</th>
      </tr>
    </thead>

    <tbody>
        
        @foreach ($cambios as $item)
        <tr>
        <td>{{$item->Id_Cambios}}</td>
        <td>{{$item->accion}}</td>
        <td>{{$item->tabla}}</td>

        <td>{{$item->fecha}}</td>
        <td>{{$item->hora}}</td>
        </tr> 
        @endforeach

    </tbody>
</table>
        

@endsection