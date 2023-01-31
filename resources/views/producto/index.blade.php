@extends('layouts.app')
@section('content') 
<div class="container"> 

@if (Session::has('mensaje'))

<div class="alert alert-success alert-dismissible" role="alert">
   <p>{{ Session::get('mensaje') }}</p>
   <button class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times</span>
   </button>           
</div>
@endif

<a href="{{url('producto/create')}}" class="btn btn-success" >Crear nuevo producto</a>
<br><br>
    
<table class="table table-light">
        <thead >
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>              
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->Nombre }}</td>
						<td>{{ $producto->Descripcion }}</td>
						<td>
                            <img class="img-thumbnail img-fluid" src="{{ asset ('storage').'/'.$producto->Imagen}}" width="80px" alt="">
                        </td>
						<td>{{ $producto->Precio }}</td>
                        
                        <td>
                            <a href="{{ url('/producto/' . $producto->id.'/edit') }}" class="btn btn-warning">Editar</a>
                            |
                            <form action="{{ url('/producto/' .$producto->id) }}" method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿Quieres borrar este producto?')">
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
</table>
{!! $productos->links() !!}
</div>
@endsection