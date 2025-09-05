<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function registroUsuarios(Request $request){

        $request->validate([
            'nombre_completo' => 'required|string|max:250',
            'correo' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuario = Usuario::crearUsuario([
            'nombre_completo' => $request->nombre_completo,
            'correo' => $request->correo,
            'password' => $request->password,
        ]);

        return redirect('/login');
    }
    
}
