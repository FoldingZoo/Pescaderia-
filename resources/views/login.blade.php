<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Pescadería</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            background: #1e40af;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1d4ed8;
        }
        p {
            color: red;
        }
    </style>
</head>
<body>
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <h2>Iniciar Sesión</h2>

        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
