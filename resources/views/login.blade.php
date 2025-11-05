<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | Pescadería Ocean's Catch</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-sky-100 via-white to-sky-200 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl flex flex-col md:flex-row overflow-hidden w-[90%] max-w-4xl">

        <!-- Imagen lateral -->
        <div class="md:w-1/2 hidden md:block">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=900&q=80" 
                 alt="Pescadería" 
                 class="object-cover w-full h-full brightness-90">
        </div>

        <!-- Formulario -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-sky-800 mb-6 text-center">Bienvenido a Ocean's Catch</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-600 px-4 py-2 rounded-md mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Usuario</label>
                    <input type="text" name="usuario" required 
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Contraseña</label>
                    <input type="password" name="clave" required 
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                </div>

                <button type="submit" 
                        class="w-full bg-sky-700 hover:bg-sky-800 text-white py-3 rounded-lg font-semibold text-lg shadow-md transition">
                    Iniciar Sesión
                </button>
            </form>

            <p class="text-center text-gray-500 text-sm mt-6">
                © {{ date('Y') }} Pescadería Ocean's Catch — Todos los derechos reservados
            </p>
        </div>
    </div>

</body>
</html>
