@extends('layoutD')

@section('contenido')
<h1>Mis Cambios</h1>
<table class="bordered">
    <thead>
      <tr>
          <th>Name</th>

      </tr>
    </thead>

    <tbody>
        
        @foreach ($cambios as $item)
        <tr>
        <td><a href="{{ route('Dcambios',$item) }}">{{ $item }}</a></td>
          </tr> 
        @endforeach

    </tbody>
</table>
         @if(!@empty($vida))
            @switch($vida)
                @case($vida == 'modifico')
                    {{$vida}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel doloremque, doloribus modi iusto aliquid corrupti, provident quisquam reprehenderit officia, debitis expedita itaque ab facilis fuga eligendi molestias sapiente animi. Eaque?
                    @break
                @case($vida == 'analizo')
                
                    {{$vida}}
                    @break
         
                    
            @endswitch
        @endif
   

@endsection