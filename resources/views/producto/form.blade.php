    @csrf
    <label for="Nombre"> Nombre </label>
    <input type="text" name="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:'' }}" id="Nombre">
    <br>
    <label for="Descripcion"> Descripcion </label>
    <input type="text" name="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:'' }}" id="Descripcion">
    <br>
    <label for="Imagen"> Imagen </label>
    @if(isset($producto->Imagen))
    <img src="{{ asset ('storage').'/'.$producto->Imagen}}" width="200" alt="">
    @endif
    <input type="file" name="Imagen" value="" id="Imagen">
    <br>
    <label for="Precio"> Precio </label>
    <input type="text" name="Precio" value="{{ isset($producto->Precio)?$producto->Precio:'' }}" id="Precio">
    <br>
    <input type="submit" value="{{ $modo }}">
    <a href="{{url('producto/')}}">Regresar</a>

