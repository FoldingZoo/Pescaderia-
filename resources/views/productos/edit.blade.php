@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>

  <form method="POST" action="{{ route('productos.update', $producto) }}" class="grid gap-4">
    @csrf @method('PUT')
    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="border p-2 rounded-md" required>
    <textarea name="descripcion" class="border p-2 rounded-md">{{ $producto->descripcion }}</textarea>
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="border p-2 rounded-md" required>
    <input type="number" name="cantidad" value="{{ $producto->cantidad }}" class="border p-2 rounded-md" required>
    <input type="text" name="imagen" value="{{ $producto->imagen }}" class="border p-2 rounded-md">
    <button class="bg-sky-700 text-white px-4 py-2 rounded-md hover:bg-sky-800">Actualizar</button>
    <a href="{{ route('productos.index') }}" class="text-gray-600 hover:underline text-sm">← Volver</a>
  </form>
</div>
@endsection
