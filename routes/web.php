<?php

use App\Http\Controllers\UsuariosController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('users.login');


Route::get('/register', function(){
    return view('auth.register');
});

Route::post('/register/usuarios', [UsuariosController::class ,'registroUsuarios'])->name('users.register');