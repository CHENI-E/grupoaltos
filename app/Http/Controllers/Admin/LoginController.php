<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Solo autentica si el usuario tiene estado = 1
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'estado' => 1])) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Si el perfil es diferente de 1, redirige a otra ruta
            if ($user->perfil != 1) {
                return redirect()->route('admin.bannerinicio.index')
                    ->with('success', 'Bienvenido al panel de administración');
            }

            // Si el perfil es 1, redirige a la ruta de usuario
            return redirect()->route('admin.usuario.index')
                ->with('success', 'Bienvenido al panel de administración');
        }

        // Si no pasa el attempt
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas o el usuario está inactivo.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }
}
