<h2>Editar Producto</h2>

<form method="POST" action="{{ url('/producto/'.$producto->id)}}"  enctype="multipart/form-data">
        {{ method_field('PATCH')}}
        @include('producto.form',['modo'=>'Editar'])
    
</form>

