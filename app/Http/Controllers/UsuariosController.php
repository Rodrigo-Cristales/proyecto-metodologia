<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UsuariosController extends Controller
{

    public function registroUsuarios(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:250',
            'correo'          => 'required|string|email',
            'password'        => 'required|string|min:8|confirmed',
        ]);

        try {
            Usuario::crearUsuario([
                'nombre_completo' => $request->nombre_completo,
                'correo'          => $request->correo,
                'password'        => $request->password,
            ]);
        } catch (QueryException $e) {
            // Código 23000 es constraint violation en SQLite/MySQL
            if ($e->getCode() === '23000') {
                return back()->withErrors(['correo' => 'Este correo ya está registrado.'])
                    ->withInput(); 
            }
            throw $e; 
        }

        return redirect('/login')->with('success', 'Usuario registrado correctamente 🚀');
    }
}
