<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginUsuarios(Request $request){

           $request->validate([
            'correo'   => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

   
        $credenciales = $request->only('correo', 'password');

     
        if (Auth::attempt($credenciales)) {
            // 🔹 Regenera la sesión para mayor seguridad

            $request->session()->regenerate();
            // Redirigir al dashboard o a donde quieras
             return redirect()->intended(route('vista.usuario'));
                            
        }
        
        return back()->withErrors([
            'correo' => 'Las credenciales no son válidas.',
        ])->onlyInput('correo');

    }

}