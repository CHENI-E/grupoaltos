<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuario.usuario', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usuario' => 'required|unique:users',
            'perfil' => 'required',
            'estado' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('admin.usuario.index')->with('success', 'Usuario creado correctamente.');
    }

}
