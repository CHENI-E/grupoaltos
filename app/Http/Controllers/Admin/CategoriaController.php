<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.producto.categoria.index');
    }

    public function create()
    {
        return view('admin.producto.categoria.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|boolean',
            'orden' => 'required|integer',
        ]);

        try {
            $imagenRuta = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                $ruta = public_path('uploads/categorias');
                
                // Crear carpeta si no existe
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $imagenRuta = 'uploads/categorias/' . $nombreArchivo;
            }
            Category::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'imagen' => $imagenRuta,
                'estado' => $request->estado,
                'orden' => $request->orden,
            ]);
            return redirect()->route('admin.categoria.create')->with('success', 'Categoría creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la categoría: ' . $e->getMessage()]);
        }

    }

    public function listCategory()
    {
        return response()->json(Category::all());
    }

    public function mostrar_registro(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_categoria' => 'required|exists:categories,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_defecto' => 'required',
            'estado' => 'required|boolean',
            'orden' => 'required|integer',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()]);
            }
        }

        try {
            $category = Category::findOrFail($request->id_categoria);
            $category->nombre = $request->nombre;
            $category->descripcion = $request->descripcion;
            $category->estado = $request->estado;
            $category->orden = $request->orden;

            if ($request->hasFile('imagen')) {
                if ($category->imagen && file_exists(public_path($category->imagen))) {
                    unlink(public_path($category->imagen));
                }
                $imagen = $request->file('imagen');
                $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                $ruta = public_path('uploads/categorias');
                
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                $imagen->move($ruta, $nombreArchivo);
                $category->imagen = 'uploads/categorias/' . $nombreArchivo;
            } else {
                $category->imagen = $request->imagen_defecto;
            }

            $category->save();

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Categoría actualizada correctamente.']);
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => ['error' => 'Error al actualizar la categoría: ' . $e->getMessage()]]);
            }
            return redirect()->back()->withErrors(['error' => 'Error al actualizar la categoría: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            if ($category->imagen && file_exists(public_path($category->imagen))) {
                unlink(public_path($category->imagen));
            }
            $category->delete();
            return response()->json(['success' => true, 'message' => 'Categoría eliminada correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'Error al eliminar la categoría: ' . $e->getMessage()]);
        }
    }

}
