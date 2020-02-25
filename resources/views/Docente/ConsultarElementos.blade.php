@extends('layoutD')

@section('contenido')
<div class="container">
<h1 class="center">Elementos</h1>
<table class="bordered striped">
    <thead>
      <tr>
          <th>Aula</th>
          <th>Elemento</th>
          <th>Estado</th> 
          
      </tr>
    </thead>

    <tbody>
        
        @foreach ($datos as $item)
        <tr>
        <td>{{$item->Aula . ' / ' . $item->Numero }}</td>
        <td>{{$item->Tipo_Elemento . ' / Id:' . $item->Id_Elemento }}</td>
        <td>{{$item->Estado}}</td>

        </tr> 
        @endforeach

    </tbody>
</table>
</div>

@endsection