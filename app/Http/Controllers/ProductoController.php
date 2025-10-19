<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
 public function index()
{
    if (!session('usuario')) {
        return redirect()->route('login');
    }

    $productos = Producto::all();
    return view('productos.index', compact('productos'));
}


    // Mostrar formulario para crear
    public function create()
    {
        return view('productos.create');
    }

    // Guardar un nuevo producto
   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'nullable',
        'precio' => 'required|numeric',
        'cantidad' => 'required|integer',
        'imagen' => 'nullable|string',
    ]);

    Producto::create($request->all());

    // ✅ Redirige al listado de productos con mensaje
    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
}

    // Mostrar formulario para editar
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'imagen' => 'nullable|string|max:255',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado correctamente');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado correctamente');
    }
    public function show($id)
{
    $producto = Producto::findOrFail($id);
    return view('productos.show', compact('producto'));
}

}
