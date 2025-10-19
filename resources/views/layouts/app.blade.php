<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Pescadería Ocean's Catch</title>
</head>
<body class="bg-sky-50 font-sans text-gray-800">
  <nav class="bg-sky-800 text-white py-4">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
      <h1 class="font-bold text-lg">🐟 Ocean's Catch</h1>
      <a href="{{ route('productos.index') }}" class="hover:text-yellow-300">Productos</a>
    </div>
    @if(session('usuario'))
  <div class="text-right p-2">
    <span class="text-gray-600 mr-2">Hola, {{ session('usuario') }}</span>
    <a href="{{ route('logout') }}" class="text-red-500 hover:underline">Cerrar sesión</a>
  </div>
@endif

  </nav>

  <main class="py-8">
    @yield('content')
  </main>

  <footer class="bg-sky-800 text-white text-center py-4 mt-8">
    <p>© 2025 Ocean's Catch. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
