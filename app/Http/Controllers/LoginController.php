<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login'); // crea esta vista
    }

    public function login(Request $request)
    {
        $usuario = $request->input('usuario');
        $clave = $request->input('clave');

        // Simulación simple
        if ($usuario === 'admin' && $clave === '1234') {
            session(['usuario' => $usuario]);
            return redirect()->route('productos.index');
        }

        return back()->with('error', 'Credenciales incorrectas.');
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login');
    }
}
