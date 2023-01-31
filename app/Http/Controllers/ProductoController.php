<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Metodo para manejar un GET
        
        $datos['productos'] = Producto::paginate(10);
        
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Metodo para manejar un POST

        $datosProductos = request()->except('_token');

        if($request->hasFile('Imagen')){

            $datosProductos['Imagen']=$request->file('Imagen')->store('uploads','public');

        }

        Producto::insert($datosProductos); // Inserto los datos en la BD

        return redirect('producto')->with('mensaje', 'Producto creado con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Método para manejar un GET a empleado/{id_empleado}/edit

        $producto = Producto::findOrFail($id);

        return view('producto.edit', compact('producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Metodo para manejar un PATCH a empleado/{id_empleado}

        $datosProducto = Request()->except(['_token', '_method']);

        if($request->hasFile('Imagen')){ 
            $producto = Producto::findOrFail($id);
            Storage::delete('public/'.$producto->Imagen);
            $datosProducto['Imagen'] = $request->file('Imagen')->store('uploads','public');
        }

        Producto::where('id', '=', $id)->update($datosProducto);
        $producto = Producto::findOrFail($id);
        //return view('producto.edit', compact('producto'));

        return redirect('producto')->with('mensaje','Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Metodo para manejar un DELETE

        $producto = Producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->Imagen));

        Producto::destroy($id);

        //return redirect('producto');
        return redirect('producto')->with('mensaje','Producto Borrado');

    }
}
