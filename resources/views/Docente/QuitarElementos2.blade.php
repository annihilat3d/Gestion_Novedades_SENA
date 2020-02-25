@extends('layoutD')

@section('contenido')
<div class="container center">
<h1>Quitar Elementos</h1>
<h6>Selecciona un aula</h6>
    <table class="bordered striped">
        <thead>
          <tr>
              <th>Aula</th>
    
          </tr>
        </thead>
    
        <tbody>
            
            @foreach ($aula as $item)
            <tr>
            <td><a href="{{route('QuitarElementos',$item->Id_Aula)}}">{{$item->Nombre . ' / ' . $item->Numero}}</a> </td>
     
            </tr> 
            @endforeach
    
        </tbody>
    </table>
</div>
@endsection