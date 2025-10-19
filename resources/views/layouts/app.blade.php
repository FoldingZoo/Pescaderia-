<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pescadería Ocean's Catch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/616/616408.png" />
</head>

<body class="bg-gradient-to-br from-sky-50 to-sky-100 font-sans text-gray-800 flex flex-col min-h-screen">

  <!-- 🔷 NAVBAR -->
  <nav class="bg-sky-800 text-white sticky top-0 shadow-md z-50">
    <div class="max-w-7xl mx-auto px-5 py-4 flex justify-between items-center">
      <a href="{{ route('productos.index') }}" class="flex items-center gap-2">
    
        <h1 class="font-bold text-xl tracking-wide hover:text-yellow-300 transition">
          Ocean's Catch
        </h1>
      </a>

      <div class="flex items-center gap-6">
        <a href="{{ route('productos.index') }}" 
           class="hover:text-yellow-300 transition font-medium">Productos</a>

        @if(session('usuario'))
          <div class="flex items-center gap-3">
            <span class="text-sm text-sky-100">⚓ Hola, <strong>{{ session('usuario') }}</strong></span>
            <a href="{{ route('logout') }}" 
               class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg text-sm font-semibold transition">
               Cerrar sesión
            </a>
          </div>
        @endif
      </div>
    </div>
  </nav>

  <!-- 📦 CONTENIDO PRINCIPAL -->
  <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-10">
      @yield('content')
  </main>

  <!-- ⚓ FOOTER -->
  <footer class="bg-sky-800 text-white py-6 mt-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p class="text-sm">&copy; {{ date('Y') }} Ocean's Catch — Todos los derechos reservados ⚓</p>
      <div class="flex justify-center gap-6 mt-2 text-xs text-sky-200">
        <a href="#" class="hover:text-white transition">Política de Privacidad</a>
        <a href="#" class="hover:text-white transition">Términos de Uso</a>
        <a href="#" class="hover:text-white transition">Contacto</a>
      </div>
    </div>
  </footer>

</body>
</html>
