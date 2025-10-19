@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Agregar Producto</h1>

  <form action="{{ route('productos.store') }}" method="POST" class="grid gap-4">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" class="border p-2 rounded-md" required>
    <textarea name="descripcion" placeholder="Descripción" class="border p-2 rounded-md"></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" class="border p-2 rounded-md" required>
    <input type="number" name="cantidad" placeholder="Cantidad" class="border p-2 rounded-md" required>
    <input type="text" name="imagen" placeholder="URL de imagen (opcional)" class="border p-2 rounded-md">
    <button class="bg-sky-700 text-white px-4 py-2 rounded-md hover:bg-sky-800">Guardar</button>
    <a href="{{ route('productos.index') }}" class="text-gray-600 hover:underline text-sm">← Volver</a>
  </form>
</div>
@endsection
