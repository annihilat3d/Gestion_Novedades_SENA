@extends('layoutD')

@section('contenido')
<div class="container">
<h1 class="center">Aulas</h1>
<table class="bordered striped">
    <thead>
      <tr>
          <th>Sillas</th>
          <th>Computadores</th>
          <th>Televisores</th> 
          <th>Escritorios</th>
          <th>Armarios</th>
          
      </tr>
    </thead>

    <tbody>
        <tr>
        @foreach ($silla as $item)
        <td>{{$item->N}}</td>    
        @endforeach
        @foreach ($computadores as $item2)
        <td>{{$item2->N}}</td>    
        @endforeach
        @foreach ($televisores as $item3)
        <td>{{$item3->N}}</td>    
        @endforeach
        @foreach ($escritorios as $item4)
        <td>{{$item4->N}}</td>    
        @endforeach
        @foreach ($armarios as $item5)
        <td>{{$item5->N}}</td>    
        @endforeach
    </tr> 
    </tbody>
</table>
</div>

@endsection