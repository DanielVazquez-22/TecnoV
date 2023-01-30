Lista de productos
<br>
<br>
<a href="{{url('producto/create')}}">Crear nuevo producto</a>
<br>
<br>
@if (Session::has('mensaje'))

<p>{{ Session::get('mensaje') }}</p>

@endif

<table>
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
                            <img src="{{ asset ('storage').'/'.$producto->Imagen}}" width="200" alt="">
                            </td>
						<td>{{ $producto->Precio }}</td>
											
                        <td>
                            <form action="{{ url('/producto/' .$producto->id) }}" method="POST">
                                @csrf
                                <a href="{{ url('/producto/' . $producto->id.'/edit') }}">Editar</a>
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Borrar" onclick="return confirm('¿Quieres borrar este producto?')">
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
</table>
