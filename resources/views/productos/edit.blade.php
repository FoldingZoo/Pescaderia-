@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-sky-50 to-sky-100">

  <!-- Contenedor principal -->
  <div class="flex-grow flex items-center justify-center py-10 px-4">
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8 transition transform hover:shadow-2xl duration-300">

      <h1 class="text-3xl font-bold text-center text-sky-800 mb-6">
        ✏️ Editar Producto
      </h1>

      <form method="POST" action="{{ route('productos.update', $producto) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
          <input type="text" name="nombre" value="{{ $producto->nombre }}"
            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-sky-500 focus:outline-none" required>
        </div>

        <!-- Descripción -->
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Descripción</label>
          <textarea name="descripcion" rows="3"
            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-sky-500 focus:outline-none"
            required>{{ $producto->descripcion }}</textarea>
        </div>

        <!-- Precio -->
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Precio</label>
          <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}"
            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-sky-500 focus:outline-none" required>
        </div>

        <!-- Cantidad -->
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Cantidad</label>
          <input type="number" name="cantidad" value="{{ $producto->cantidad }}"
            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-sky-500 focus:outline-none" required>
        </div>

        <!-- Imagen -->
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Imagen (URL)</label>
          <input type="text" name="imagen" value="{{ $producto->imagen }}"
            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-sky-500 focus:outline-none"
            placeholder="https://...">
        </div>

        <!-- Botones -->
        <div class="flex flex-col gap-3 mt-6">
          <button type="submit"
            class="bg-sky-700 text-white font-semibold py-2 rounded-lg hover:bg-sky-800 transition">
            💾 Guardar Cambios
          </button>

          <a href="{{ route('productos.index') }}"
            class="text-center text-sky-700 font-medium hover:underline">
            ← Volver al listado
          </a>
        </div>
      </form>

    </div>
  </div>

  
</div>
@endsection
