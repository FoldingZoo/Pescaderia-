@extends('layouts.app')

@section('content')
<!-- HERO -->
<section class="relative bg-[url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center text-white">
  <div class="bg-black/60 absolute inset-0"></div>
  <div class="relative z-10 max-w-6xl mx-auto py-24 px-6 text-center">
    <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">
      Frescura del Mar a tu Mesa
    </h1>
    <p class="text-lg md:text-xl mb-6 max-w-2xl mx-auto">
      Descubre los mejores productos del mar, seleccionados con calidad y pasión.
    </p>
    <a href="#productos" class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-md text-lg font-semibold transition">
      Ver Productos
    </a>
  </div>
</section>

<!-- ABOUT -->
<section class="bg-gray-50 py-16 px-6 text-center">
  <div class="max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold mb-4 text-sky-800">Sobre Nosotros</h2>
    <p class="text-gray-700 text-lg leading-relaxed">
      En <strong>Pescadería Fishery</strong> trabajamos con pescadores locales para llevarte los productos más frescos y de mejor calidad.
      Nuestro compromiso es ofrecer alimentos saludables, sostenibles y deliciosos para tu hogar o negocio.
    </p>
  </div>
</section>

<!-- PRODUCTOS -->
<section id="productos" class="max-w-6xl mx-auto py-16 px-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Lista de Productos</h2>
    <a href="{{ route('productos.create') }}" class="bg-sky-700 hover:bg-sky-800 text-white px-5 py-2 rounded-lg shadow-md transition">
      + Agregar Producto
    </a>
  </div>

  <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
    <table class="min-w-full bg-white rounded-lg">
      <thead class="bg-sky-700 text-white uppercase text-sm">
        <tr>
          <th class="py-3 px-4 text-left">Nombre</th>
          <th class="py-3 px-4 text-left">Descripción</th>
          <th class="py-3 px-4 text-left">Precio</th>
          <th class="py-3 px-4 text-left">Cantidad</th>
          <th class="py-3 px-4 text-left">Imagen</th>
          <th class="py-3 px-4 text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @foreach($productos as $producto)
        <tr class="hover:bg-gray-50 transition">
          <td class="py-3 px-4 font-medium text-gray-800">{{ $producto->nombre }}</td>
          <td class="py-3 px-4 text-gray-600">{{ $producto->descripcion }}</td>
          <td class="py-3 px-4 text-gray-700">${{ number_format($producto->precio, 2) }}</td>
          <td class="py-3 px-4 text-gray-700">{{ $producto->cantidad }}</td>
          <td class="py-3 px-4">
            @if($producto->imagen)
              <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen de {{ $producto->nombre }}" class="w-20 h-20 object-cover rounded-md border">
            @else
              <span class="text-gray-400 italic">Sin imagen</span>
            @endif
          </td>
          <td class="py-3 px-4 text-center">
            <a href="{{ route('productos.edit', $producto) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-3">Editar</a>
            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button class="text-red-600 hover:text-red-800 font-semibold" onclick="return confirm('¿Eliminar producto?')">
                Eliminar
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>


@endsection
