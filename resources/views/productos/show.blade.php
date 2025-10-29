@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-gradient-to-br from-sky-50 to-sky-100">

  <!-- Contenido principal -->
  <div class="flex-grow flex items-center justify-center py-10 px-4">
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-lg p-8 transition transform hover:shadow-2xl duration-300">

      <h1 class="text-3xl font-bold text-center text-sky-800 mb-6">
        🐠 Detalle del Producto
      </h1>

      <!-- Detalles del producto -->
      <div class="space-y-4 text-gray-700">
        
        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase">Nombre</p>
          <p class="text-lg font-medium">{{ $producto->nombre }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase">Descripción</p>
          <p class="text-base">{{ $producto->descripcion ?: 'Sin descripción' }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase">Precio</p>
          <p class="text-lg font-medium text-green-700">${{ number_format($producto->precio, 2) }}</p>
        </div>

        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase">Cantidad disponible</p>
          <p class="text-lg font-medium">{{ $producto->cantidad }}</p>
        </div>

        <!-- 🟦 Categoría -->
        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase">Categoría</p>
          <p class="text-lg font-medium">
            {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría asignada' }}
          </p>
        </div>

        <!-- 🖼 Imagen -->
        @if($producto->imagen)
        <div class="flex justify-center mt-6">
          <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" 
               class="w-48 h-48 object-cover rounded-xl shadow-md border">
        </div>
        @else
        <div class="flex justify-center mt-6 text-gray-400 italic">
          <p>Sin imagen disponible</p>
        </div>
        @endif
      </div>

      <!-- Botones -->
      <div class="mt-8 flex flex-col gap-3">
        <a href="{{ route('productos.index') }}" 
           class="bg-sky-700 text-white text-center py-2 rounded-lg hover:bg-sky-800 transition font-semibold">
          ← Volver al listado
        </a>
        <a href="{{ route('productos.edit', $producto) }}" 
           class="text-center text-sky-700 font-semibold hover:underline">
          ✏️ Editar producto
        </a>
      </div>

    </div>
  </div>

</div>
@endsection
