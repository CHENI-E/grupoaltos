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

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return response()->json(['success' => true, 'message' => 'Usuario eliminado correctamente.']);
    }

    public function findUser($id)
    {
        /* $id = $request->input('id'); */
        $usuario = User::find($id);

        if ($usuario) {
            return response()->json($usuario);
        } else {
            return response()->json('Usuario no encontrado.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'input_nombre' => 'required',
            'input_email' => 'required|email|unique:users,email,'.$id,
            'input_perfil' => 'required',
            'input_estado' => 'required',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->nombre = $request->input('input_nombre');
        $usuario->email = $request->input('input_email');
        $usuario->perfil = $request->input('input_perfil');
        $usuario->estado = $request->input('input_estado');
        $usuario->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente.']);
        }

        return redirect()->route('admin.usuario.index')->with('success', 'Usuario actualizado correctamente.');
    }


}
