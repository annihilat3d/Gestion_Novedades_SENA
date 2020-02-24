@extends('layoutA')

@section('contenido')
<h1 class="center">Docentes</h1>
<table class="bordered striped">
    <thead>
      <tr>
          <th>Identificacion</th>
          <th>Nombres</th>
          <th>Apellidos</th> 
          <th>Correo</th>
          <th>Cuentadante</th>
          <th>Modalidad</th>
          <th>Estado</th>
          <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
        
        @foreach ($datos as $item)
        <tr>
        <td>{{$item->identificacion}}</td>
        <td>{{$item->nombres}}</td>
        <td>{{$item->apellidos}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->cuentadante}}</td>
        <td>{{$item->modalidad}}</td>
        <td>{{$item->estado}}</td>
        <td> </td>
        </tr> 
        @endforeach

    </tbody>
</table>
        

@endsection