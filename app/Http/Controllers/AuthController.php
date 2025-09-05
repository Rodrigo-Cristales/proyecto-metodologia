<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginUsuarios(Request $request){

        $request->validate([
            'correo'=>'required|string|email',
            'password'=> 'required|string|min:8',
        ]);

        $credenciales = $request->only('correo', 'password');

            if(Auth::guard('web')->attempt($credenciales)){
                $request->session()->regenerateToken();
            };

    }
}
