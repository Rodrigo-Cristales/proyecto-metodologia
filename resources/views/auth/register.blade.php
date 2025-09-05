<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-6">
        <a href="/login" class="inline-block mb-4 text-blue-600 hover:underline">
            &larr; Volver login
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Registro de usuarios</h1>
        <p class="text-gray-600">Crea tu cuenta para comenzar a comprar</p>
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

    <form method="POST" action="{{route('users.register')}}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre completo</label>
            <input type="text" id="name" name="nombre_completo" value="{{ old('nombre_completo') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required autofocus>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
            <input type="email" id="email" name="correo" value="{{ old('correo') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>


        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
            <input type="password" id="password" name="password"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>


        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Crear Cuenta
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">¿Ya tienes una cuenta?
            <a href="/login" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </div>
</div>
</body>
</html>
