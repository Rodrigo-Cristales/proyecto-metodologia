<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Musica feliz</h1>
        <p class="text-gray-600">Inicia sesión en tu cuenta</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('users.login')}}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
            <input type="email" id="email" name="correo" value="{{ old('correo') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required autofocus>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
            <input type="password" id="password" name="password"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-700">Recordarme</label>
            </div>
            <a href="" class="text-sm text-blue-600 hover:underline">
                ¿Olvidaste tu contraseña?
            </a>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Iniciar Sesión
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">¿No tienes una cuenta?
            <a href="/register" class="text-blue-600 hover:underline">Regístrate aquí</a>
        </p>
    </div>
</div>
</body>
</html>
