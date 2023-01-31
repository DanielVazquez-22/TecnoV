<div class="form-group">
    @csrf
    <div class="form-control">
    <label for="Nombre"> Nombre </label>
    <input type="text" name="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:'' }}" id="Nombre">
    <br>
    </div>

    <div class="form-control">
    <label for="Descripcion"> Descripcion </label>
    <input type="text" name="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:'' }}" id="Descripcion">
    <br>
    </div>

    <div class="form-control">
    <label for="Imagen"> Imagen </label>
    @if(isset($producto->Imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset ('storage').'/'.$producto->Imagen}}" width="80px" alt="">
    @endif
    <input type="file" name="Imagen" value="" id="Imagen">
    <br>
    </div>

    <div class="form-control">
    <label for="Precio"> Precio </label>
    <input type="text" name="Precio" value="{{ isset($producto->Precio)?$producto->Precio:'' }}" id="Precio">
    <br>
    </div>

    <input type="submit" class="btn btn-success" value="{{ $modo }}">
    <a class="btn btn-primary" href="{{url('producto/')}}">Regresar</a>
</div>
