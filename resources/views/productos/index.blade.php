@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>
  <a href="{{ route('productos.create') }}" class="bg-sky-700 text-white px-4 py-2 rounded-md hover:bg-sky-800">Agregar Producto</a>

  <table class="min-w-full mt-4 border border-gray-300 rounded-lg">
    <thead class="bg-sky-700 text-white">
      <tr>
        <th class="py-2 px-3">Nombre</th>
        <th class="py-2 px-3">Descripción</th>
        <th class="py-2 px-3">Precio</th>
        <th class="py-2 px-3">Cantidad</th>
        <th class="py-2 px-3">Imagen</th>
        <th class="py-2 px-3">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
      <tr class="border-b">
        <td class="py-2 px-3">{{ $producto->nombre }}</td>
        <td class="py-2 px-3">{{ $producto->descripcion }}</td>
        <td class="py-2 px-3">${{ number_format($producto->precio, 2) }}</td>
        <td class="py-2 px-3">{{ $producto->cantidad }}</td>
        <td class="py-2 px-3">{{ $producto->imagen }}</td>
        <td class="py-2 px-3">
          <a href="{{ route('productos.edit', $producto) }}" class="text-blue-600 hover:underline">Editar</a> |
          <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
