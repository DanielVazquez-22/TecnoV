@extends('layouts.app')
@section('content')
<div class="container">
<h2>Crear Producto</h2>

<form method="POST" action="{{ url('/producto')}}"  enctype="multipart/form-data">

    @include('producto.form',['modo'=>'Crear'])

</form>
</div>
@endsection

