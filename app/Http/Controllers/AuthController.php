<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $titulo = "Inicio de Sesión";
        return view('modules.auth.login', compact('titulo'));
    }

    public function logear(Request $request)
    {
        // Validar campos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Verificar credenciales
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        // En caso de error
        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function crearAdmin(){
        User::create([
            'name' => 'Walter Medina',
            'email' => 'waltermedina1357@gmail.com',
            'password' => Hash::make('123456'),
            'activo' => true,
            'rol' => 'admin'
        ]);

        return "Admin creado con exito!!";
    }
}
