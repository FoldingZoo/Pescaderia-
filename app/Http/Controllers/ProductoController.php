<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // 🔹 Mostrar todos los productos
    public function index()
    {
        if (!session('usuario')) {
            return redirect()->route('login');
        }

        // Trae los productos junto con su categoría
        $productos = Producto::with('categoria')->get();

        return view('productos.index', compact('productos'));
    }

    // 🔹 Mostrar formulario para crear un producto
    public function create()
    {
        // Trae todas las categorías para el select del formulario
        $categorias = Categoria::all();

        return view('productos.create', compact('categorias'));
    }

    // 🔹 Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id', // ahora es obligatorio
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
                         ->with('success', '✅ Producto creado correctamente.');
    }

    // 🔹 Mostrar formulario para editar un producto
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    // 🔹 Actualizar un producto existente
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
                         ->with('success', '✅ Producto actualizado correctamente.');
    }

    // 🔹 Mostrar detalles de un producto
    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);

        return view('productos.show', compact('producto'));
    }

    // 🔹 Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
                         ->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
